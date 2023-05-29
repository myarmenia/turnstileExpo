avatar.addEventListener("change", (e) => {
    document.querySelector('.avatar_div').innerHTML=''

    let file = e.target.files;
    let url = URL.createObjectURL(file[0])

    document.querySelector('.avatar_div').innerHTML = `<div class="d-flex file_div">
                                                        <img src="${url}">
                                                    </div>`;
    avatarRemove()
})

