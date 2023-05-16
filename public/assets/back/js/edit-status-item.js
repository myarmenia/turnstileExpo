console.log(11)
if(document.getElementById('select_status') != null){
    document.getElementById('select_status').addEventListener('change', function(){
        let status = this.options[this.selectedIndex].value

    })
}

