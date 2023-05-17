if(document.getElementById('select_status') != null){
    document.getElementById('select_status').addEventListener('change', function(){

        let status = this.options[this.selectedIndex].value
        let item_id = this.getAttribute('data-id')
        let table = this.getAttribute('data-table')
        let delete_url = this.getAttribute('data-delete-url')

        csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if(status == 'delete'){

            fetch('/'+delete_url+'/'+item_id,{
                method: 'DELETE',
                headers: {'X-CSRF-TOKEN':csrf }
            }).then(async response => {
                    if (response.ok) {
                        window.location.href = '/press-release'
                    }
                })
        }
        else{
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

