$('#search_roommate').on('click', function(){
    let search = $('#search').val()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
            type: 'POST',
            url: `/room/search-roommate`,
            data: {search},
            cache: false,
            success: function(result){
                let content = ''
                result.users.forEach(user => {
                    let count_unread_message = user.messages.length
                    let count =''
                    if(count_unread_message > 0){
                        count = `<span class="badge bg-danger float-end">  ${count_unread_message} </span>`
                    }
                    content +=`<li class="p-2 border-bottom">

                                    <a href="/check-room/${user.id}" class="d-flex justify-content-between">
                                        <div class="d-flex flex-row">
                                            <img
                                                src="/get-file?path=${user.roles[0].avatar}"
                                                alt="avatar"
                                                class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                                width="60"
                                            />
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0">${user.name} ${user.second_name}</p>
                                            </div>
                                        </div>
                                        <div class="pt-1" id="user_${user.id}">
                                            ${count}
                                        </div>
                                    </a>
                                </li>`
                });

                $('#users-div').html(content)

            }
    })
})

$(':input[type="search"]').on('input',function () {
    if($(this).val() == ''){
        $('#search_roommate').click()
    }
 });
