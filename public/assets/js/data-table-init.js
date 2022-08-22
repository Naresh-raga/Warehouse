$(function () {
    
    var table = $('#data_table_cms').DataTable({
        processing: true,
        serverSide: true,
        ajax: dt.cms,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

    var table = $('#data_table_blog').DataTable({
        processing: true,
        serverSide: true,
        ajax: dt.blog,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'image', name: 'image'},
            {data: 'title', name: 'title'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ],
        "fnDrawCallback": function( oSettings ) {
            //document.getElementById('chkToggle2').switchButton();
        }
    });

    var table = $('#data_table_et').DataTable({
        processing: true,
        serverSide: true,
        ajax: dt.et,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'subject', name: 'subject'},
            {data: 'sender_email', name: 'sender_email'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ],
        "fnDrawCallback": function( oSettings ) {
            //document.getElementById('chkToggle2').switchButton();
        }
    });

    var table = $('#data_table_role').DataTable({
        processing: true,
        serverSide: true,
        ajax: dt.role,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ],
        "fnDrawCallback": function( oSettings ) {
            //document.getElementById('chkToggle2').switchButton();
        }
    });

    var table = $('#data_table_cat').DataTable({
        processing: true,
        serverSide: true,
        ajax: dt.cat,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ],
        "fnDrawCallback": function( oSettings ) {
            //document.getElementById('chkToggle2').switchButton();
        }
    });

    var table = $('#data_table_testimonial').DataTable({
        processing: true,
        serverSide: true,
        ajax: dt.testimonial,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'author_image', name: 'author_image'},
            {data: 'author', name: 'author'},
            {data: 'title', name: 'title'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

    var table = $('#data_table_pt').DataTable({
        processing: true,
        serverSide: true,
        ajax: dt.pt,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'qty', name: 'qty'},
            {data: 'product_type', name: 'product_type'},
            {data: 'rate', name: 'rate'},
            {data: 'weight_type', name: 'weight_type'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

    var table = $('#data_table_wh').DataTable({
        processing: true,
        serverSide: true,
        ajax: dt.wh,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {title:'Owner', data: 'owner.name', name: 'owner.name'},
            {data: 'address', name: 'address'},
            {title:'State', data: 'state', name: 'state'},
            {data: 'pincode', name: 'pincode'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

    var table = $('#data_table_users').DataTable({
        processing: true,
        serverSide: true,
        ajax: dt.users,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'mobile', name: 'mobile'},
            {data: 'address', name: 'address'},
            {data: 'pincode', name: 'pincode'},
            {data: 'gst', name: 'gst'},
            {data: 'adhar', name: 'adhar'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

    var table = $('#data_table_allergy').DataTable({
        processing: true,
        serverSide: true,
        ajax: dt.allergy,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

    var table = $('#data_table_ft').DataTable({
        processing: true,
        serverSide: true,
        ajax: dt.ft,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

    var table = $('#data_table_mp').DataTable({
        processing: true,
        serverSide: true,
        ajax: dt.mp,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'image', name: 'image'},
            {data: 'title', name: 'title'},
            {data: 'qty_per_day', name: 'qty_per_day'},
            {data: 'price', name: 'price'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

    
  });