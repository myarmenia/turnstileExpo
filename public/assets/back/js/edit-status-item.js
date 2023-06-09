if(document.getElementById('select_status') != null){
    document.getElementById('select_status').addEventListener('change', function(){

        let status = this.options[this.selectedIndex].value
        let item_id = this.getAttribute('data-id')
        let table = this.getAttribute('data-table')
        let delete_url = this.getAttribute('data-delete-url')

        console.log(status, item_id, table, delete_url);

        csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if(status == 'delete'){
            console.log(777)

            fetch('/'+delete_url+'/'+item_id,{
                method: 'DELETE',
                headers: {'X-CSRF-TOKEN':csrf }
            }).then(async response => {
                    if (response.ok) {
                        console.log(77777)
                        window.location.href = '/' + delete_url
                    }
                })
        }
        else{
            console.log(8888)
            fetch('/change_status/'+item_id+'/'+table+'/'+status,{
                method: 'get',
                headers: {'X-CSRF-TOKEN':csrf },
            }).then(async response => {
                    if (response.ok) {
                        window.location.reload()
                    }
                })
        }

    })
}

