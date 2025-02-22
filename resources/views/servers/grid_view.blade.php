@extends('layout')
@section('title')
    <?= get_label('servers', 'Servers') ?> -
    <?= get_label('grid_view', 'Grid view') ?>
@endsection
@php
    $user = getAuthenticatedUser();
@endphp
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-2 mt-4">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home.index') }}"><?= get_label('home', 'Home') ?></a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{ getDefaultViewRoute('servers') }}"><?= get_label('servers', 'Servers') ?></a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#create_server_modal"><button
                        type="button" class="btn btn-sm btn-primary action_create_servers" data-bs-toggle="tooltip"
                        data-bs-placement="left"
                        data-bs-original-title="<?= get_label('create_server', 'Create server') ?>"><i
                            class='bx bx-plus'></i></button></a>
            </div>
        </div>

        @if (is_countable($servers) && count($servers) > 0)
            @php
                $showSettings =
                    $user->can('edit_servers') || $user->can('delete_servers') || $user->can('create_servers');
                $canEditServers = $user->can('edit_servers');
                $canDeleteServers = $user->can('delete_servers');
                $canDuplicateServers = $user->can('create_servers');
            @endphp
            <div class="d-flex row mt-4">
                @foreach ($servers as $server)
                    <div class="col-md-6">
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h4 class="card-title">
                                        <a href="{{ url('/master-panel/servers/information/' . $server->id) }}"
                                            target="_blank" class="text-body">
                                            <strong>{{ $server->name }}</strong>
                                        </a>
                                    </h4>
                                    <div class="d-flex align-items-center">
                                        @if ($showSettings)
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="mx-2" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class='bx bx-cog'></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    @if ($canEditServers)
                                                        <a href="javascript:void(0);" class="edit-server"
                                                            data-id="{{ $server->id }}">
                                                            <li class="dropdown-item">
                                                                <i class='menu-icon tf-icons bx bx-edit text-primary'></i>
                                                                {{ get_label('edit', 'Edit') }}
                                                            </li>
                                                        </a>
                                                    @endif
                                                    @if ($canDeleteServers)
                                                        <a href="javascript:void(0);" class="delete" data-reload="true"
                                                            data-type="servers" data-id="{{ $server->id }}">
                                                            <li class="dropdown-item">
                                                                <i class='menu-icon tf-icons bx bx-trash text-danger'></i>
                                                                {{ get_label('delete', 'Delete') }}
                                                            </li>
                                                        </a>
                                                    @endif
                                                </ul>
                                            </div>
                                        @endif
                                        <a href="javascript:void(0);" class="quick-view mx-2"
                                            data-id="{{ $server->id }}" data-type="server">
                                            <i class='bx bx-info-circle text-info' data-bs-toggle="tooltip"
                                                data-bs-placement="right" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="my-{{ $server->status != '' ? '3' : '2' }}">
                                    <div class="row align-items-center mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">{{ get_label('status', 'Status') }}</label>
                                            <div class="d-flex align-items-center">
                                                <div class="status-selector" id="statusSelector">
                                                    <span
                                                        class="status-tag badge bg-label-{{ $server->status == 0 ? 'danger' : 'success' }} selected"
                                                        data-value="{{ $server->status }}">
                                                        {{ $server->status == 0 ? 'In Active' : 'Active' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div>
                    {{ $servers->links() }}
                </div>
            </div>
        <!-- delete project modal -->
        @else
            <?php $type = 'servers'; ?>
            <x-empty-state-card :type="$type" />
        @endif
</div>
<script>
    var add_favorite = '<?= get_label('add_favorite', 'Click to mark as favorite') ?>';
    var remove_favorite = '<?= get_label('remove_favorite', 'Click to remove from favorite') ?>';
</script>
<script src="{{ asset('assets/js/pages/project-grid.js') }}"></script>
@endsection
