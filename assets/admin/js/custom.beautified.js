$(document).ready(function() {
    var e = $(location).attr("href"), a = e.split("/"), s = location.href.split("/");
    if ("painel" == a[3]) if ("categorias" == a[5]) var t = a[4] + "/" + a[5]; else var t = a[4]; else if ("categorias" == a[6]) var t = a[5] + "/" + a[6]; else var t = a[5];
    s.pop(), "undefined" != typeof s[5] && s.pop(), "undefined" != typeof s[4] && s.pop(), 
    s = s.join("/") + "/", $("body").on("submit", "form", function(e) {
        e.preventDefault();
        var a = $(this).attr("action"), s = new FormData($(this)[0]);
        $("#summernote").length > 0 && s.append("summernote", $("#summernote").summernote("code")), 
        $.ajax({
            type: "POST",
            url: a,
            data: s,
            contentType: !1,
            cache: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                e.message && $("#message").html(e.message).hide().fadeIn("slow"), e.message_edit && $("#message_edit").html(e.message_edit).hide().fadeIn("slow"), 
                e.message_add && $("#message_add").html(e.message_add).hide().fadeIn("slow"), e.message_profile && $("#message_profile").html(e.message_profile).hide().fadeIn("slow"), 
                (e.modal || e.close) && $(".modal").modal("hide"), e.redirect && (window.location.href = e.redirect);
            }
        });
    }), "undefined" != typeof $("#summernote").summernote && $("#summernote").summernote({
        lang: "pt-BR",
        toolbar: [ [ "style", [ "bold", "underline", "clear" ] ], [ "font", [ "fontname" ] ], [ "fontsize", [ "fontsize" ] ], [ "color", [ "color" ] ], [ "para", [ "ul", "ol", "paragraph" ] ], [ "height", [ "height" ] ], [ "table", [ "table" ] ], [ "insert", [ "link", "picture", "video" ] ], [ "full", [ "fullscreen", "undo", "redo", "codeview" ] ] ],
        height: "250px"
    }), $(".inline-editor").summernote({
        airMode: !0
    }), "undefined" != typeof $("table#table-depoiments").DataTable && $(function() {
        $("table#table-depoiments").DataTable({
            language: {
                sEmptyTable: "Nenhum registro encontrado",
                sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
                sInfoFiltered: "(Filtrados de _MAX_ registros)",
                sInfoPostFix: "",
                sInfoThousands: ".",
                sLengthMenu: "_MENU_ resultados por página",
                sLoadingRecords: "Carregando...",
                sProcessing: "Processando...",
                sZeroRecords: "Nenhum registro encontrado",
                sSearch: "Pesquisar",
                oPaginate: {
                    sNext: "Próximo",
                    sPrevious: "Anterior",
                    sFirst: "Primeiro",
                    sLast: "Último"
                },
                oAria: {
                    sSortAscending: ": Ordenar colunas de forma ascendente",
                    sSortDescending: ": Ordenar colunas de forma descendente"
                }
            },
            processing: !0,
            serverSide: !0,
            ajax: {
                url: s + t,
                type: "post"
            },
            columns: [ {
                data: "id",
                name: "id",
                visible: !1
            }, {
                data: "title",
                name: "title",
                orderable: !1
            }, {
                data: "action",
                name: "action",
                orderable: !1
            } ],
            order: [ [ 0, "asc" ] ]
        });
    }), "undefined" != typeof $("table#table-galleries").DataTable && $("table#table-galleries").DataTable({
        language: {
            sEmptyTable: "Nenhum registro encontrado",
            sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
            sInfoFiltered: "(Filtrados de _MAX_ registros)",
            sInfoPostFix: "",
            sInfoThousands: ".",
            sLengthMenu: "_MENU_ resultados por página",
            sLoadingRecords: "Carregando...",
            sProcessing: "Processando...",
            sZeroRecords: "Nenhum registro encontrado",
            sSearch: "Pesquisar",
            oPaginate: {
                sNext: "Próximo",
                sPrevious: "Anterior",
                sFirst: "Primeiro",
                sLast: "Último"
            },
            oAria: {
                sSortAscending: ": Ordenar colunas de forma ascendente",
                sSortDescending: ": Ordenar colunas de forma descendente"
            }
        },
        processing: !0,
        serverSide: !0,
        ajax: {
            url: s + t,
            type: "post"
        },
        columns: [ {
            data: "id",
            name: "id",
            visible: !1
        }, {
            data: "title",
            name: "title",
            orderable: !1
        }, {
            data: "action",
            name: "action",
            orderable: !1
        } ],
        order: [ [ 0, "asc" ] ]
    }), "undefined" != typeof $("table#table-pages").DataTable && $("table#table-pages").DataTable({
        language: {
            sEmptyTable: "Nenhum registro encontrado",
            sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
            sInfoFiltered: "(Filtrados de _MAX_ registros)",
            sInfoPostFix: "",
            sInfoThousands: ".",
            sLengthMenu: "_MENU_ resultados por página",
            sLoadingRecords: "Carregando...",
            sProcessing: "Processando...",
            sZeroRecords: "Nenhum registro encontrado",
            sSearch: "Pesquisar",
            oPaginate: {
                sNext: "Próximo",
                sPrevious: "Anterior",
                sFirst: "Primeiro",
                sLast: "Último"
            },
            oAria: {
                sSortAscending: ": Ordenar colunas de forma ascendente",
                sSortDescending: ": Ordenar colunas de forma descendente"
            }
        },
        processing: !0,
        serverSide: !0,
        ajax: {
            url: s + t,
            type: "post"
        },
        columns: [ {
            data: "id",
            name: "id",
            visible: !1
        }, {
            data: "title",
            name: "title",
            orderable: !1
        }, {
            data: "action",
            name: "action",
            orderable: !1
        } ],
        order: [ [ 0, "asc" ] ]
    }), "undefined" != typeof $("table#table-users").DataTable && $("table#table-users").DataTable({
        language: {
            sEmptyTable: "Nenhum registro encontrado",
            sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
            sInfoFiltered: "(Filtrados de _MAX_ registros)",
            sInfoPostFix: "",
            sInfoThousands: ".",
            sLengthMenu: "_MENU_ resultados por página",
            sLoadingRecords: "Carregando...",
            sProcessing: "Processando...",
            sZeroRecords: "Nenhum registro encontrado",
            sSearch: "Pesquisar",
            oPaginate: {
                sNext: "Próximo",
                sPrevious: "Anterior",
                sFirst: "Primeiro",
                sLast: "Último"
            },
            oAria: {
                sSortAscending: ": Ordenar colunas de forma ascendente",
                sSortDescending: ": Ordenar colunas de forma descendente"
            }
        },
        processing: !0,
        serverSide: !0,
        ajax: {
            url: s + t,
            type: "post"
        },
        columns: [ {
            data: "id",
            name: "id",
            visible: !1
        }, {
            data: "name",
            name: "name",
            orderable: !1
        }, {
            data: "email",
            name: "email",
            orderable: !1
        }, {
            data: "action",
            name: "action",
            orderable: !1
        } ],
        order: [ [ 0, "asc" ] ]
    }), "undefined" != typeof $("table#table-groups").DataTable && $("table#table-groups").DataTable({
        language: {
            sEmptyTable: "Nenhum registro encontrado",
            sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
            sInfoFiltered: "(Filtrados de _MAX_ registros)",
            sInfoPostFix: "",
            sInfoThousands: ".",
            sLengthMenu: "_MENU_ resultados por página",
            sLoadingRecords: "Carregando...",
            sProcessing: "Processando...",
            sZeroRecords: "Nenhum registro encontrado",
            sSearch: "Pesquisar",
            oPaginate: {
                sNext: "Próximo",
                sPrevious: "Anterior",
                sFirst: "Primeiro",
                sLast: "Último"
            },
            oAria: {
                sSortAscending: ": Ordenar colunas de forma ascendente",
                sSortDescending: ": Ordenar colunas de forma descendente"
            }
        },
        processing: !0,
        serverSide: !0,
        ajax: {
            url: s + t,
            type: "post"
        },
        columns: [ {
            data: "id",
            name: "id",
            visible: !1
        }, {
            data: "title",
            name: "title",
            orderable: !1
        }, {
            data: "action",
            name: "action",
            orderable: !1
        } ],
        order: [ [ 0, "asc" ] ]
    }), "undefined" != typeof $("table#table-modules").DataTable && $("table#table-modules").DataTable({
        language: {
            sEmptyTable: "Nenhum registro encontrado",
            sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
            sInfoFiltered: "(Filtrados de _MAX_ registros)",
            sInfoPostFix: "",
            sInfoThousands: ".",
            sLengthMenu: "_MENU_ resultados por página",
            sLoadingRecords: "Carregando...",
            sProcessing: "Processando...",
            sZeroRecords: "Nenhum registro encontrado",
            sSearch: "Pesquisar",
            oPaginate: {
                sNext: "Próximo",
                sPrevious: "Anterior",
                sFirst: "Primeiro",
                sLast: "Último"
            },
            oAria: {
                sSortAscending: ": Ordenar colunas de forma ascendente",
                sSortDescending: ": Ordenar colunas de forma descendente"
            }
        },
        processing: !0,
        serverSide: !0,
        ajax: {
            url: s + t,
            type: "post"
        },
        columns: [ {
            data: "id",
            name: "id",
            visible: !1
        }, {
            data: "title",
            name: "title",
            orderable: !1
        }, {
            data: "action",
            name: "action",
            orderable: !1
        } ],
        order: [ [ 0, "asc" ] ]
    }), "undefined" != typeof $("table#table-module-categories").DataTable && $("table#table-module-categories").DataTable({
        drawCallback: function() {
            this.api().rows().every(function(e, a, s) {
                this.nodes().to$().find(".js-switch").each(function(e, a) {
                    1 == a.value && a.setAttribute("checked", "checked");
                    new Switchery(a, {
                        size: "small"
                    });
                });
            });
        },
        language: {
            sEmptyTable: "Nenhum registro encontrado",
            sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
            sInfoFiltered: "(Filtrados de _MAX_ registros)",
            sInfoPostFix: "",
            sInfoThousands: ".",
            sLengthMenu: "_MENU_ resultados por página",
            sLoadingRecords: "Carregando...",
            sProcessing: "Processando...",
            sZeroRecords: "Nenhum registro encontrado",
            sSearch: "Pesquisar",
            oPaginate: {
                sNext: "Próximo",
                sPrevious: "Anterior",
                sFirst: "Primeiro",
                sLast: "Último"
            },
            oAria: {
                sSortAscending: ": Ordenar colunas de forma ascendente",
                sSortDescending: ": Ordenar colunas de forma descendente"
            }
        },
        processing: !0,
        serverSide: !0,
        ajax: {
            url: s + t,
            type: "post"
        },
        columns: [ {
            data: "id",
            name: "id",
            visible: !1
        }, {
            data: "title",
            name: "title",
            orderable: !1
        }, {
            data: "status",
            name: "status",
            orderable: !1
        }, {
            data: "action",
            name: "action",
            orderable: !1
        } ],
        order: [ [ 0, "asc" ] ]
    }), $("#remove").on("show.bs.modal", function(e) {
        var a = $(this), s = $(this).find(".btn-ok"), t = $(e.relatedTarget).data("href"), o = $(e.relatedTarget).parents("tr");
        s.bind("click", function(e) {
            s.unbind("click"), e.preventDefault(), e.stopImmediatePropagation(), a.modal("hide");
            var n = new FormData();
            n.append("id", $("#id").val()), $.ajax({
                type: "POST",
                url: t,
                data: n,
                contentType: !1,
                cache: !1,
                processData: !1,
                dataType: "json",
                success: function(e) {
                    1 == e.status && o.fadeOut("fast", function() {
                        $(this).remove();
                    }), e.message && $("#message").html(e.message).hide().fadeIn("slow"), e.redirect && (window.location.href = e.redirect);
                }
            });
        });
    }), $("#edit").on("show.bs.modal", function(e) {
        var a = ($(this), $(this).find(".btn-ok"), $(e.relatedTarget).data("href"), $(e.relatedTarget).data("id"));
        $(e.relatedTarget).parents("tr");
        $.ajax({
            type: "POST",
            url: s + t + "/edit/" + a,
            data: null,
            contentType: !1,
            cache: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                $.each(e.edit, function(e, a) {
                    $("#" + e).val(a).trigger("change");
                });
            }
        });
    }), "undefined" != typeof $("select[name=icon]").select2 && $("select[name=icon]").select2({
        placeholder: "Selecione um ícone",
        allowClear: !0
    }), "undefined" != typeof $("select[name=module]").select2 && $("select[name=module]").select2({
        placeholder: "Selecione um módulo",
        allowClear: !0
    }), "undefined" != typeof $("select[name=group]").select2 && $("select[name=group]").select2({
        placeholder: "Selecione um grupo",
        allowClear: !0
    }), "undefined" != typeof $("select[name=category]").select2 && $("select[name=category]").select2({
        placeholder: "Selecione uma categoria",
        allowClear: !0
    }), $("#add-module").on("show.bs.modal", function(e) {
        var a = $(this), s = a.find("form").attr("action");
        $("select[name=module]").change(function(e) {
            e.preventDefault(), a.modal("hide");
            var t = new FormData($("#form_module")[0]);
            t.append("id", $("#id").val()), $.ajax({
                type: "POST",
                url: s,
                data: t,
                mimeType: "multipart/form-data",
                contentType: !1,
                cache: !1,
                processData: !1,
                dataType: "json",
                success: function(e) {
                    e.module && $("#modules").append(e.module).children(":last").hide().fadeIn("slow"), 
                    e.message && $("#message").html(e.message).hide().fadeIn("slow");
                }
            });
        });
    }), $("#add-group").on("show.bs.modal", function(e) {
        var a = $(this), s = a.find("form").attr("action");
        $("select[name=group]").change(function(e) {
            e.preventDefault(), a.modal("hide");
            var t = new FormData($("#form_group")[0]);
            t.append("id", $("#id").val()), $.ajax({
                type: "POST",
                url: s,
                data: t,
                mimeType: "multipart/form-data",
                contentType: !1,
                cache: !1,
                processData: !1,
                dataType: "json",
                success: function(e) {
                    e.group && $("#groups").append(e.group).children(":last").hide().fadeIn("slow"), 
                    e.message && $("#message").html(e.message).hide().fadeIn("slow");
                }
            });
        });
    }), "undefined" != typeof $("#gallery").sortable && $("#gallery").sortable({
        stop: function() {
            $.map($(this).find("div"), function(e) {
                var a = e.id, o = $(e).index();
                data = new FormData(), data.append("item_id", a), data.append("item_index", o), 
                $.ajax({
                    type: "POST",
                    url: s + t + "/imagens/update",
                    data: data,
                    contentType: !1,
                    cache: !1,
                    processData: !1,
                    dataType: "json",
                    success: function(e) {
                        e.message && $("#message").html(e.message).hide().fadeIn("slow");
                    }
                });
            });
        }
    }), "undefined" != typeof $("#droppable").droppable && $("#droppable").droppable({
        drop: function(e, a) {
            var o = a.draggable, n = a.draggable[0].id;
            $(o).hide("slow"), $.ajax({
                type: "POST",
                url: s + t + "/imagens/destroy/" + n,
                data: null,
                contentType: !1,
                cache: !1,
                processData: !1,
                dataType: "json",
                success: function(e) {
                    e.message && $("#message").html(e.message).hide().fadeIn("slow"), e.redirect && (window.location.href = e.redirect);
                }
            });
        }
    }), 0 == $("#alert").length && $("#droppable").show(), $("body").on("change", "input:file.gallery_images", function(e) {
        e.preventDefault(), data = new FormData(), data.append("userfile", $(this)[0].files[0]), 
        data.append("id", $("#id").val()), $.ajax({
            type: "POST",
            url: s + t + "/imagens/store",
            data: data,
            mimeType: "multipart/form-data",
            contentType: !1,
            cache: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                e.gallery && ($(".alert").length > 0 && ($(".alert").hide("slow").remove(), $("#droppable").show("slow")), 
                $(".gallery").fadeTo("300", "0.5", function() {
                    $(this).html($(this).html() + e.gallery).fadeTo("300", "1");
                })), e.message && $("#message").html(e.message).hide().fadeIn("slow");
            }
        });
    }), $("body").on("click", "input:checkbox.js-switch", function(e) {
        data = new FormData(), data.append($(this).attr("name"), $(this).val()), data.append("id", $(this).attr("id")), 
        $.ajax({
            type: "POST",
            url: s + t + "/update",
            data: data,
            contentType: !1,
            cache: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                e.message && $("#message").html(e.message).hide().fadeIn("slow"), $(".navigation-menu").load(document.URL + " .navigation-menu"), 
                $(".submenu").load(document.URL + " .submenu");
            }
        });
    });
});