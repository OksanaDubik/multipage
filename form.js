document.addEventListener('DOMContentLoaded', function () {//
    const form = document.getElementById('form');//
    form.addEventListener('submit', formSend);//

    async function formSend(e) {//
        e.preventDefault();//

        let error = formValidate(form);//

        let formData = new FormData(form);//получаем данные формы//
        formData.append('image', formImage.files[0]);//добавляем изображение//


        if (error === 0) {//
            form.classList.add('_sending');//
            let response = await fetch('sendmail.php', {//
                method: 'POST',//
                body: formData//
            });//
            if (response.ok) {//
                let result = await response.json();//
                alert(result.message);//
                formPreview.innerHTML = '';//
                form.reset();//
                form.classList.remove('_sending');//
            } else {//
                alert('ошибка отправки данных ' + response.status);//
                form.classList.remove('_sending');//
            }//
        } else {//
            alert('Для продолжения необходимо ваше согласие на обработку данных')//
        }//
    }//

    function formValidate(form) {//
        let error = 0;//
        let formReq = document.querySelectorAll('._req');//

        for (let i = 0; i < formReq.length; i++) {//
            const input = formReq[i];//
            formRemoveError(input);//

            if (input.getAttribute('type') === 'checkbox' && input.checked === false) {//
                formAddError(input);//
                error++;//
            }else {//
                if(input.value === ""){//
                    formAddError(input);//
                    error++;//
                }//
            }//
        }//
        return error;//
    }//

    function formAddError(input) {//
        input.parentElement.classList.add('_error');//
        input.classList.add('_error')//
    }//

    function formRemoveError(input) {//
        input.parentElement.classList.remove('_error');//
        input.classList.remove('_error');//
    }//


    //*получаем отображения превью *//

    const formPreview = document.getElementById('formPreview');//
    const formImage = document.getElementById('formImage');//

    formImage.addEventListener('change', () => {//
        uploadFile(formImage.files[0]);//
    })//


    function uploadFile(file) {//
        if (!['image/jpg', 'image/jpeg', 'image/png', 'image/pdf'].includes(file.type)) {//
            alert('Разрешены только изображения');//
            formImage.value = '';//
            return;//
        }//
        if (file.size > 2 * 1024 * 1024) {//
            alert('Файл должен быть менее 2 Мб');//
            return;//
        }//
        let reader = new FileReader();//
        reader.onload = function (e) {//
            formPreview.innerHTML = `<img src="${e.target.result}" alt="Фото">`;//
        };//
        reader.onerror = function (e) {//
            alert('Ошибка загрузки превью.')//
        };//
        reader.readAsDataURL(file);//
    }//
})//


