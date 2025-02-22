<!-- projects -->



@if ((isset($projects) && $projects > 0) || (isset($emptyState) && $emptyState == 0))
    <div class="mt-2">
@endif


@if ((isset($projects) && $projects > 0) || (isset($emptyState) && $emptyState == 0))
    <div class="table-responsive text-nowrap">
        <input type="hidden" id="data_type" value="tasks">
        <input type="hidden" id="data_table" value="task_table">
        <input type="hidden" id="save_column_visibility">
        <table id="task_table" data-toggle="table" data-loading-template="loadingTemplate"
            data-url="{{ isset($viewAssigned) && $viewAssigned == 1 ? '' : (!empty($id) ? route('servers.projects.list', ['id' => $id]) : route('servers.projects.list')) }}"
            data-icons-prefix="bx" data-icons="icons" data-show-refresh="true" data-total-field="total"
            data-trim-on-search="false" data-data-field="rows" data-page-list="[5, 10, 20, 50, 100, 200]"
            data-search="true" data-side-pagination="server" data-show-columns="true" data-pagination="true"
            data-sort-name="id" data-sort-order="desc" data-mobile-responsive="true"
            data-query-params="queryParamsTasks">
            <thead>
                <tr>
                    <th data-checkbox="true"></th>

                    <th data-field="id"
                        data-sortable="true">{{ get_label('id', 'ID') }}</th>
                    <th data-field="name"
                        data-sortable="true">{{ get_label('project_name', 'Project Name') }}</th>
                    <th data-field="path"
                        data-sortable="true">{{ get_label('path', 'Path') }}</th>
                    <th data-field="created_at"
                        data-sortable="true"><?= get_label('created_at', 'Created at') ?></th>
                    <th data-field="updated_at"
                        data-sortable="true"><?= get_label('updated_at', 'Updated at') ?></th>
                    <th data-field="actions">
                        {{ get_label('actions', 'Actions') }}</th>
                </tr>
            </thead>
        </table>
    </div>
@else
    @if (!isset($emptyState) || $emptyState != 0)
        <?php
        $type = 'Server_Project';
        ?>
        <x-empty-state-card :type="$type" />
    @endif
@endif

@if ((isset($projects) && $projects > 0) || (isset($emptyState) && $emptyState == 0))
    </div>
@endif

<script>
    var label_update = '<?= get_label('update', 'Update') ?>';
    var label_delete = '<?= get_label('delete', 'Delete') ?>';
    var label_duplicate = '<?= get_label('duplicate', 'Duplicate') ?>';
    var label_not_assigned = '<?= get_label('not_assigned', 'Not assigned') ?>';
    var add_favorite = '<?= get_label('add_favorite', 'Click to mark as favorite') ?>';
    var remove_favorite = '<?= get_label('remove_favorite', 'Click to remove from favorite') ?>';
    var label_filter_projects = "<?= get_label('select_projects', 'Select projects') ?>";
    var label_filter_users = "<?= get_label('select_users', 'Select users') ?>";
    var label_filter_clients = "<?= get_label('select_clients', 'Select clients') ?>";
    var label_filter_priority= "<?= get_label('select_priority', 'Select Priority') ?>";
    var id = '<?= $id ?? '' ?>';
</script>
<script src="{{ asset('assets/js/pages/tasks.js') }}"></script>
