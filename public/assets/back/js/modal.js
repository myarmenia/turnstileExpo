
const create_request_route = (link,id)=>{
    const form = document.querySelectorAll(".form")[0]
    form.action=`${link}/${id}`
}
