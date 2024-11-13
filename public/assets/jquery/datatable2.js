$(document).ready(function(){
    $('#datatable').DataTable({
        "language": {
            'url': 'http://localhost/ci4_biblioteca/public/assets/jquery/pt-BR.json'
        }
    })
})

if(document.getElementById('autor_obra')){
    $(document).ready(function(){
        $('#autor_obra').DataTable({
            info: false,
            ordering: false,
            paging: false,
            searching: false,
            
            scrollCollapse: true,
            scrollY: '300px'


        })
    })
}