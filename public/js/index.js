const saveAccessToken = (url, access_token) => {
    if(access_token != ''){
        axios.post(url, {
            access_token: access_token
        })
        .then(function (response) {
            if(response.data.status == 'success'){
                iziToast.success({
                    message: response.data.message,
                });
                setTimeout(function(){
                    window.location.reload();
                }, 1000);
            }else{
                iziToast.error({
                    message: response.data.message,
                });
            }
        })
        .catch(function (err) {
            console.log(err)
        })
    }else{
        let message = '';
        if(access_token == ''){
            message += 'Please enter the access token first.';
        }
        iziToast.error({
            message: message,
        });
    }
}

const getAllRepo = (url) => {
    axios.get(url)
    .then(function (response) {
        if(response.data.status == 'success'){
            iziToast.success({
                message: response.data.message,
            });
            console.log(response.data.data);
            $('.starred-repo-div').html(response.data.data);
        }else{
            iziToast.error({
                message: response.data.message,
            });
        }
    })
    .catch(function (err) {
        console.log(err)
    })
}

const getAllStarredRepo = (url) => {
    axios.get(url)
    .then(function (response) {
        if(response.data.status == 'success'){
            iziToast.success({
                message: response.data.message,
            });
            console.log(response.data.data);
            $('.starred-repo-div').html(response.data.data);
        }else{
            iziToast.error({
                message: response.data.message,
            });
        }
    })
    .catch(function (err) {
        console.log(err)
    })
}

$('#reveal-access-token').on('click', function(){
    if($('#access-token').attr('type') == 'password'){
        $('#access-token').attr('type', 'text');
    }else{
        $('#access-token').attr('type', 'password');
    }
})