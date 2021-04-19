define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'sign/sign/index' + location.search,
                    add_url: 'sign/sign/add',
                    edit_url: 'sign/sign/edit',
                    del_url: 'sign/sign/del',
                    multi_url: 'sign/sign/multi',
                    import_url: 'sign/sign/import',
                    table: 'sign_data',
                    pageSize: 10,
                    pageList: [10, 30, 50, 'All'],
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'admin_id', title: __('Admin_id')},
                        {field: 'channel_id', title: __('Channel_id')},
                        {field: 'pv', title: __('Pv')},
                        {field: 'uv', title: __('Uv')},
                        {field: 'increase_date', title: __('Increase_date')},
                        {field: 'increase_sign_amount', title: __('Increase_sign_amount')},
                        {field: 'increase_kandian_amount', title: __('Increase_kandian_amount')},
                        {field: 'box_one', title: __('Box_one')},
                        {field: 'money_one', title: __('Money_one')},
                        {field: 'box_two', title: __('Box_two')},
                        {field: 'money_two', title: __('Money_two')},
                        {field: 'box_three', title: __('Box_three')},
                        {field: 'money_three', title: __('Money_three')},
                        {field: 'box_four', title: __('Box_four')},
                        {field: 'money_four', title: __('Money_four')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            },
            formatter: {
                message: function (value, row, index) {
                    return '<a href="/admin/sign/sign/info?id=' + row.id + '" style="cursor:pointer;" title="查看详情" class="btn btn-xs book_but">详情</a>';
                },
            }
        }
    };
    return Controller;
});