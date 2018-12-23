var DatatableJsonRemoteDemo = function() {
    var t = function() {
        var t = $(".m_datatable").mDatatable({
                data: {
                    type: "remote",
                    source: "./api/datatable/data-json/historyMemberDemo.json",
                    pageSize: 10,
                    saveState: {
                        cookie: !0,
                        webstorage: !0
                    }
                },
                layout: {
                    theme: "default",
                    class: "",
                    scroll: !1,
                    height: 550,
                    footer: !1
                },
                sortable: !0,
                pagination: !0,
                search: {
                    input: $("#generalSearch"),
                },
                columns: [{
                    field: "Mã khách hàng",
                    title: "Mã khách hàng",

                }, {
                    field: "Thời gian",
                    title: "Thời gian"
                }, {
                    field: "Dịch vụ",
                    title: "Dịch vụ",
                    width: 200,
                    textAlign: "center",

                },]
            }),
            e = t.getDataSourceQuery();
        $("#m_form_status").on("change", function() {
            t.search($(this).val(), "Status")
        }).val(void 0 !== e.Status ? e.Status : ""), $("#m_form_type").on("change", function() {
            t.search($(this).val(), "Type")
        }).val(void 0 !== e.Type ? e.Type : ""), $("#m_form_status, #m_form_type").selectpicker()
    };
    return {
        init: function() {
            t()
        }
    }
}();
jQuery(document).ready(function() {
    DatatableJsonRemoteDemo.init()
});