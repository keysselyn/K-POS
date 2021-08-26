'<td>'+
    '<div class="row">'+

    '<form action="{{route("productos.destroy",'+arreglo[x].id+')}}" method="post" class="frm-eliminar">'+
        '@method("delete")'+
        '@csrf'+
        '<a class="btn btn-warning" href="{{route("productos.edit",'+arreglo[x].id+')}}">'+
            '<i class="fa fa-edit"></i>'+
        '</a>'+
        '<button type="submit" class="btn btn-danger">'+
            '<i class="fa fa-trash"></i>'+
        '</button>'+
    '</form>'+
    '</div>'+
'</td>';
