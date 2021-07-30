let fasSlash=document.querySelector('i.fa-eye-slash');
let fasEye=document.querySelector('i.fa-eye');
let input =document.querySelector("#exampleInputPassword1");
fasEye.addEventListener('click',()=>{
    fasSlash.classList.toggle('open');
    console.log(input.type)
    if (input.type==='password') {
        input.type="text";
    }
    else{
        input.type="password";
    }
});

