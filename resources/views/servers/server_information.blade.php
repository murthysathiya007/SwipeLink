@extends('layout')
@section('title')
    <?= get_label('server_details', 'Server details') ?>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-2 mt-4">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home.index') }}"><?= get_label('home', 'Home') ?></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('servers.index') }}">{{ get_label('servers', 'Servers') }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ $server->name }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="fw-bold">{{ $server->name }}
                                    <a href="javascript:void(0);" class="mx-2"></a>
                                </h2>
                                <div class="row">
                                    <div class="col-md-6 mb-3 mt-3">
                                        <label class="form-label"
                                            for="start_date"><?= get_label('host', 'Host') ?></label>
                                            <p><span class="badge bg-primary">{{ $server->host }}</span></p>
                                    </div>
                                    <div class="col-md-6 mb-3 mt-3">
                                        <label class="form-label"
                                            for="end_date"><?= get_label('ssh_username', 'SSH Username') ?></label>
                                            <p><span class="badge bg-primary">{{ $server->ssh_username }}</span></p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"><?= get_label('pem_file', 'Pem File') ?></label>
                                        <p><span class="badge bg-primary">{{ $server->pem_file }}</span></p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="prioritySelect"
                                            class="form-label"><?= get_label('git_username', 'Git Username') ?></label>
                                            <p><span class="badge bg-primary">{{ $server->git_username }}</span></p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="prioritySelect"
                                            class="form-label"><?= get_label('git_password', 'Git Password') ?></label>
                                            <p><span class="badge bg-primary">*********</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <input type="hidden" id="media_type_id" value="{{ $project->id }}"> --}}
        <!-- Tabs -->
        <div class="nav-align-top mt-2">
            <ul class="nav nav-tabs" role="tablist">
                @php
                    $activeTab = '';
                @endphp

                <li class="nav-item">
                    <button type="button" class="nav-link {{ empty($activeTab) ? 'active' : '' }}" role="tab"
                        data-bs-toggle="tab" data-bs-target="#navs-top-server_projects" aria-controls="navs-top-server_projects">
                        <i class="menu-icon tf-icons bx bx-task text-primary"></i><?= get_label('server_projects', 'Server Projects') ?>
                    </button>
                </li>
                @php
                    if (empty($activeTab)) {
                        $activeTab = 'server_projects';
                    }
                @endphp


            </ul>
            <div class="tab-content">
                <div class="tab-pane fade {{ $activeTab == 'server_projects' ? 'active show' : '' }}" id="navs-top-server_projects" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div></div>
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#create_server_project_modal">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                data-bs-placement="left"
                                data-bs-original-title="<?= get_label('create_server_project', 'Create Server Project') ?>">
                                <i class="bx bx-plus"></i>
                            </button>
                        </a>
                    </div>
                    <?php
                        $id = 'server_' . $server->id;
                        $projects = $server->projects->count();
                    ?>
                    <x-server-project-card :id="$id" :projects="$projects" :emptyState="0" />
                </div>
            </div>
        </div>
    {{-- <div class="modal fade" id="create_milestone_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form class="modal-content form-submit-event" action="{{ route('projects.store_milestone') }}"
                method="POST">
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <input type="hidden" name="dnr">
                <input type="hidden" name="table" value="project_milestones_table">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">
                        <?= get_label('create_milestone', 'Create milestone') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="nameBasic" class="form-label"><?= get_label('title', 'Title') ?> <span
                                    class="asterisk">*</span></label>
                            <input type="text" name="title" class="form-control"
                                placeholder="<?= get_label('please_enter_title', 'Please enter title') ?>">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nameBasic" class="form-label"><?= get_label('starts_at', 'Starts at') ?> <span
                                    class="asterisk">*</span></label>
                            <input type="text" id="start_date" name="start_date" class="form-control" placeholder=""
                                autocomplete="off">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nameBasic" class="form-label"><?= get_label('ends_at', 'Ends at') ?> <span
                                    class="asterisk">*</span></label>
                            <input type="text" id="end_date" name="end_date" class="form-control" placeholder=""
                                autocomplete="off">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nameBasic" class="form-label"><?= get_label('status', 'Status') ?> <span
                                    class="asterisk">*</span></label>
                            <select class="form-select" name="status">
                                <option value="incomplete"><?= get_label('incomplete', 'Incomplete') ?></option>
                                <option value="complete"><?= get_label('complete', 'Complete') ?></option>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nameBasic" class="form-label"><?= get_label('cost', 'Cost') ?> <span
                                    class="asterisk">*</span></label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">{{ $general_settings['currency_symbol'] }}</span>
                                <input type="text" name="cost" class="form-control"
                                    placeholder="<?= get_label('please_enter_cost', 'Please enter cost') ?>">
                            </div>
                            <span class="text-danger error-message mt-1 text-xs"></span>
                        </div>
                    </div>
                    <label for="description" class="form-label"><?= get_label('description', 'Description') ?></label>
                    <textarea class="form-control description" name="description"
                        placeholder="<?= get_label('please_enter_description', 'Please enter description') ?>"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <?= get_label('close', 'Close') ?>
                    </button>
                    <button type="submit" id="submit_btn"
                        class="btn btn-primary"><?= get_label('create', 'Create') ?></button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="edit_milestone_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form class="modal-content form-submit-event" action="{{ route('contracts.update') }}" method="POST">
                <input type="hidden" name="id" id="milestone_id">
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <input type="hidden" name="dnr">
                <input type="hidden" name="table" value="project_milestones_table">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">
                        <?= get_label('update_milestone', 'Update milestone') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="nameBasic" class="form-label"><?= get_label('title', 'Title') ?> <span
                                    class="asterisk">*</span></label>
                            <input type="text" name="title" id="milestone_title" class="form-control"
                                placeholder="<?= get_label('please_enter_title', 'Please enter title') ?>">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nameBasic" class="form-label"><?= get_label('starts_at', 'Starts at') ?> <span
                                    class="asterisk">*</span></label>
                            <input type="text" id="update_milestone_start_date" name="start_date"
                                class="form-control" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nameBasic" class="form-label"><?= get_label('ends_at', 'Ends at') ?> <span
                                    class="asterisk">*</span></label>
                            <input type="text" id="update_milestone_end_date" name="end_date" class="form-control"
                                placeholder="" autocomplete="off">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nameBasic" class="form-label"><?= get_label('status', 'Status') ?> <span
                                    class="asterisk">*</span></label>
                            <select class="form-select" id="milestone_status" name="status">
                                <option value="incomplete"><?= get_label('incomplete', 'Incomplete') ?></option>
                                <option value="complete"><?= get_label('complete', 'Complete') ?></option>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nameBasic" class="form-label"><?= get_label('cost', 'Cost') ?> <span
                                    class="asterisk">*</span></label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">{{ $general_settings['currency_symbol'] }}</span>
                                <input type="text" name="cost" id="milestone_cost" class="form-control"
                                    placeholder="<?= get_label('please_enter_cost', 'Please enter cost') ?>">
                            </div>
                            <span class="text-danger error-message mt-1 text-xs"></span>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="nameBasic" class="form-label"><?= get_label('progress', 'Progress') ?></label>
                            <input type="range" name="progress" id="milestone_progress" class="form-range">
                            <h6 class="milestone-progress mt-2"></h6>
                            <span class="text-danger error-message mt-1 text-xs"></span>
                        </div>
                    </div>
                    <label for="description" class="form-label"><?= get_label('description', 'Description') ?></label>
                    <textarea class="form-control description" name="description" id="milestone_description"
                        placeholder="<?= get_label('please_enter_description', 'Please enter description') ?>"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <?= get_label('close', 'Close') ?>
                    </button>
                    <button type="submit" id="submit_btn"
                        class="btn btn-primary"><?= get_label('update', 'Update') ?></button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="add_media_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form class="modal-content form-horizontal" id="media-upload" action="{{ route('projects.upload_media') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1"><?= get_label('add_media', 'Add Media') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible" role="alert">
                        <?= $media_storage_settings['media_storage_type'] == 's3' ? get_label('storage_type_set_as_aws_s3', 'Storage type is set as AWS S3 storage') : get_label('storage_type_set_as_local', 'Storage type is set as local storage') ?>,
                        <a href="/settings/media-storage"
                            target="_blank"><?= get_label('click_here_to_change', 'Click here to change.') ?></a>
                    </div>
                    <div class="dropzone dz-clickable" id="media-upload-dropzone">
                    </div>
                    <div class="form-group mt-4 text-center">
                        <button class="btn btn-primary"
                            id="upload_media_btn"><?= get_label('upload', 'Upload') ?></button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="form-group" id="error_box">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <?= get_label('close', 'Close') ?>
                    </button>
                </div>
            </form>
        </div>
    </div> --}}
    <script>
        //labels
        var serverID = {{ $server->id }};
    </script>
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/pages/project-information.js') }}"></script>

@endsection
