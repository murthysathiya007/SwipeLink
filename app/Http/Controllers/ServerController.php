<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\ServerProject;
use Illuminate\Http\Request;
use App\Services\DeletionService;

class ServerController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // fetch session and use it in entire class with constructor
            $this->user = getAuthenticatedUser();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servers = Server::where("admin_id", getAdminIdByUserRole())->paginate(6);
        return view('servers.grid_view', ['servers' => $servers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function list($id = '')
    {
        $search = request('search');
        $sort = (request('sort')) ? request('sort') : "id";
        $order = (request('order')) ? request('order') : "DESC";

        if ($id) {
            $id = explode('_', $id);
            $belongs_to = $id[0];
            $belongs_to_id = $id[1];
            if ($belongs_to == 'server') {
                $server = Server::find($belongs_to_id);
                $projects = $server->projects();
            }
        }

        if ($search) {
            $projects = $projects->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            });
        }

        // Count total tasks before pagination
        $totalprojects = $projects->count();

        $canCreate = checkPermission('create_tasks');
        $canEdit = checkPermission('edit_tasks');
        $canDelete = checkPermission('delete_tasks');


        // Paginate tasks and format them
        $projects = $projects->orderBy($sort, $order)->paginate(request('limit'))->through(function ($project) use ($canEdit, $canDelete, $canCreate) {

            $actions = '';
            if ($canEdit) {
                $actions .= '<a href="javascript:void(0);" class="edit-server_project" data-id="' . $project->id . '" title="' . get_label('update', 'Update') . '">' .

                    '<i class="bx bx-edit mx-1"></i>' .
                    '</a>';
            }

            if ($canDelete) {
                $actions .= '<button title="' . get_label('delete', 'Delete') . '" type="button" class="btn delete" data-id="' . $project->id . '" data-type="tasks" data-table="server_table">' .
                    '<i class="bx bx-trash text-danger mx-1"></i>' .
                    '</button>';
            }

            if ($canCreate) {
                $actions .= '<a href="javascript:void(0);" class="duplicate" data-id="' . $project->id . '" data-title="' . $project->name . '" data-type="tasks" data-table="server_table" title="' . get_label('duplicate', 'Duplicate') . '">' .
                    '<i class="bx bx-copy text-warning mx-2"></i>' .
                    '</a>';
            }

            $actions .= '<a href="javascript:void(0);" class="quick-view" data-id="' . $project->id . '" title="' . get_label('git_pull_and_push', 'Git Pull & Push') . '">' .
                '<i class="bx bx-git-pull-request mx-3"></i>' .
                '</a>';

            $actions = $actions ?: '-';

            return [
                'id' => $project->id,
                'name' => $project->name,
                'path' => $project->path,
                'created_at' => format_date($project->created_at, true),
                'updated_at' => format_date($project->updated_at, true),
                'actions' => $actions
            ];
        });


        // Return JSON response with formatted tasks and total count
        return response()->json([
            "rows" => $projects->items(),
            "total" => $totalprojects,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'host' => ['required', 'string', 'max:255'],
            'ssh_username' => ['required', 'string', 'max:255'],
            'pem_file' => ['required', 'file', 'max:10240'],
            'git_username' => ['required', 'string', 'max:255'],
            'git_password' => ['required', 'string', 'max:255'],
        ]);

        // Handle file upload for PEM file
        if ($request->hasFile('pem_file')) {
            $pemFile = $request->file('pem_file');

            // Check if the file extension is .pem
            if ($pemFile->getClientOriginalExtension() !== 'pem') {
                return response()->json([
                    'error' => true,
                    'message' => 'Invalid file extension. Only PEM files are allowed.'
                ], 400);
            }

            // Custom validation to check if the file is a valid PEM file
            $contents = file_get_contents($pemFile);
            if (strpos($contents, "-----BEGIN") === false || strpos($contents, "-----END") === false) {
                return response()->json([
                    'error' => true,
                    'message' => 'Invalid PEM file format. Please upload a valid PEM file.'
                ], 400);
            }

            // Encrypt the PEM file content before storing (for extra protection)
            $encryptedPemContent = encrypt($contents);  // Encrypt the PEM file content

            // Store the PEM file securely (in storage/app/private/pem_files)
            $pemFilePath = 'pem_files/' . uniqid() . '.pem';  // Unique path for security
            \Storage::disk('local')->put($pemFilePath, $encryptedPemContent);

            // Save the path to the database
            $formFields['pem_file'] = $pemFilePath;
        }

        $formFields['admin_id'] = getAdminIdByUserRole();
        $formFields['user_id'] =  auth()->id();
        $server = Server::create($formFields);
        return response()->json(['error' => false, 'message' => 'Server created successfully.', 'id' => $server->id, 'server' => $server]);
    }

    /**
     * Display the specified resource.
     */
    public function get($id)
    {
        $server = Server::findOrFail($id);
        return response()->json(['server' => $server]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $server = Server::findOrFail($id);
        $projects = $server->projects;
        return view('servers.server_information', ['server' => $server, 'projects' => $projects,  'auth_user' => $this->user]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate the request to ensure 'id' is provided
        $formFields = $request->validate([
            'id' => ['required', 'exists:servers,id'], // Ensure the server exists in the database
            'name' => ['required', 'string', 'max:255'],
            'host' => ['required', 'string', 'max:255'],
            'ssh_username' => ['required', 'string', 'max:255'],
            'git_username' => ['required', 'string', 'max:255'],
            'git_password' => ['nullable', 'string', 'max:255'],
            'pem_file' => ['nullable', 'file', 'max:10240'], // PEM file is optional in update
        ]);

        // Find the existing server by ID
        $server = Server::findOrFail($formFields['id']);

        // Update the server fields with the new data from the request
        $server->name = $request->input('name');
        $server->host = $request->input('host');
        $server->ssh_username = $request->input('ssh_username');
        $server->git_username = $request->input('git_username');

        // Check if git_password is provided in the request and encrypt it before saving
        if ($request->has('git_password')) {
            $server->git_password = $request->input('git_password');
        }

        // Handle file upload for PEM file if a new one is uploaded
        if ($request->hasFile('pem_file')) {
            $pemFile = $request->file('pem_file');

            // Check if the file extension is .pem
            if ($pemFile->getClientOriginalExtension() !== 'pem') {
                return response()->json([
                    'error' => true,
                    'message' => 'Invalid file extension. Only PEM files are allowed.'
                ], 400);
            }

            // Custom validation to check if the file is a valid PEM file
            $contents = file_get_contents($pemFile);
            if (strpos($contents, "-----BEGIN") === false || strpos($contents, "-----END") === false) {
                return response()->json([
                    'error' => true,
                    'message' => 'Invalid PEM file format. Please upload a valid PEM file.'
                ], 400);
            }

            // Optionally encrypt the PEM file content before storing (for extra protection)
            $encryptedPemContent = encrypt($contents);  // Encrypt the PEM file content

            // Delete the old PEM file if exists (optional, to avoid unused files)
            if ($server->pem_file) {
                \Storage::disk('local')->delete($server->pem_file);
            }

            // Store the new PEM file securely (in storage/app/private/pem_files)
            $pemFilePath = 'pem_files/' . uniqid() . '.pem';  // Unique path for security
            \Storage::disk('local')->put($pemFilePath, $encryptedPemContent);

            // Save the new PEM file path to the database
            $server->pem_file = $pemFilePath;
        }

        // Save the updated server data and check for success
        if ($server->save()) {
            return response()->json([
                'error' => false,
                'message' => 'Server updated successfully.',
                'id' => $server->id
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Server could not be updated.'
            ]);
        }
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $server = Server::findOrFail($id);
        $response = DeletionService::delete(Server::class, $id, 'Server');
        return $response;
    }


    public function downloadPemFile($filename)
    {
        // Ensure the file exists
        $filePath = storage_path("app/pem_files/{$filename}");
        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        // Add any decryption logic here if necessary
        // For example: decrypt the file before serving it
        $decryptedContent = decrypt(file_get_contents($filePath));
        return response($decryptedContent, 200)->header('Content-Type', 'application/x-pem-file');

        // // Serve the file for download
        // return response()->download($filePath, $filename, [
        //     'Content-Type' => 'application/x-pem-file',
        // ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function projectStore(Request $request)
    {
        // Validate the form data
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'path' => ['required', 'string', 'max:255'],
            'branch' => ['required', 'string', 'max:255'],
            'server_id' => ['required'],
        ]);

        $server_project = ServerProject::create($formFields);
        return response()->json(['error' => false, 'message' => 'Server Project created successfully.', 'id' => $server_project->id, 'server_project' => $server_project]);
    }
}
