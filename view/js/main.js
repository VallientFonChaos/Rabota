/*
    Авторизация
 */

$('.login-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    const login = $('input[name="login"]').val();
    const password = $('input[name="password"]').val();
    const isLoginEmpty = login === '';
    const isPasswordEmpty = password === ''; 
    
    if (isLoginEmpty) {
        $('.msglog').text('Введите Логин');
    } else {
        $('.msglog').text('');
    }

    if (isPasswordEmpty) {
        $('.msgpas').text('Введите Пароль');
    } else {
        $('.msgpas').text('');
    }

    if (isLoginEmpty || isPasswordEmpty) {
        return;
    }


    $.ajax({
        url: 'connect/loginConnect.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success (data) {
            if (data.status) {
                document.location.href = '/profile.php';
            } else {         
                $('.msg').removeClass('none').text(data.message);     
            }

        }
    });

});


/*
    Регистрация
 */

$('.register-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    const login = $('input[name="login"]').val();
    const password = $('input[name="password"]').val();
    const name = $('input[name="name"]').val();
    const email = $('input[name="email"]').val();
    const passwordConfirm = $('input[name="passwordConfirm"]').val();
    const isLoginEmpty = login === '';
    const isPasswordEmpty = password === ''; 
    const isNameEmpty = name === '';
    const isEmailEmpty = email === ''; 
    const isPasswordConfirmEmpty = passwordConfirm === ''; 


    let formData = new FormData();

    formData.append('name', name);
    formData.append('login', login);
    formData.append('password', password);
    formData.append('passwordConfirm', passwordConfirm);
    formData.append('email', email);

    if (isNameEmpty) {
        $('.msgname').text('Поле Name не должно быть пустым');
    } else {
        $('.msgname').text('');
    }

    if (isLoginEmpty) {
        $('.msglog').text('Поле Login не должно быть пустым');
    } else {
        $('.msglog').text('');
    }

    if (isPasswordEmpty) {
        $('.msgpas').text('Поле Password не должно быть пустым');
    } else {
        $('.msgpas').text('');
    }

    if (isPasswordConfirmEmpty) {
        $('.msgCpas').text('Поле Password Confirm не должно быть пустым');
    } else {
        $('.msgCpas').text('');
    }

    if (isEmailEmpty) {
        $('.msgemail').text('Поле Email не должно быть пустым');
    } else {
        $('.msgemail').text('');
    }

    if (isLoginEmpty || isPasswordEmpty || isNameEmpty || isEmailEmpty || isPasswordConfirmEmpty) {
        return;
    }

    $.ajax({
        url: 'connect/registerConnect.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = '/login.php';
            } else {
                $('.msg').removeClass('none').text(data.message);

            }

        }
    });

});
