deleteItem()
function deleteItem(){
    document.querySelectorAll('.delete_item').forEach(el=>{
        el.addEventListener('click', deleteItemFromDB)
    })
}

function deleteItemFromDB()
{


    let item_id = this.getAttribute('data-id')
    let type = this.getAttribute('data-type')
    let table = this.getAttribute('data-table')
    let that = this
    console.log(that)
    if(document.querySelectorAll('.'+type).length > 1){


        csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


        fetch('/delete_item/'+item_id+'/'+table+'/'+type,{
            method: 'get',
            headers: {'X-CSRF-TOKEN':csrf },
        }).then(async response => {
                if (response.ok) {
                    console.log('789')
                    if(type == 'link_logo') {
                        that.parentNode.parentNode.remove()
                    }else {
                        that.parentNode.remove()
                    }
                }
            })
    }
}
