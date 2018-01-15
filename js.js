function disablesubmit(){
    document.getElementById("sbm").disabled = true;
}
function check(){
//   检查是否填写完成，若填写完成，则将submit按钮变为可用状态
    var input = document.getElementsByTagName("input");
    var sex = document.getElementsByName("sex");
    var checked = true;
    var sexcheck = false;
    for(var i=0;i<input.length;i++){
        if(input[i].name!=="sex"&&input[i].name!=="btm"&&input[i].value.length===0){
            checked = false;
        }
    }
    for(var i=0;i<sex.length;i++) {
        if (sex[i].checked) {
            sexcheck = true
            break;
        }
    }
    if(document.forms["form1"].cv.value.replace(/(^[\s\t\xa0\u3000]+)|([\u3000\xa0\s\t]+$)/g, "")==="") checked = false;
    if(checked===true&&sexcheck===true) document.getElementById("sbm").disabled = false;
}
function submitcheck() {
    //表单验证，验证是否填写正确
    var reg = /^[0-9]+$/;
    var zmnumReg=/^[0-9a-zA-Z]*$/;
    var emailreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    if(document.forms["form1"].firstname.value.length===0||document.forms["form1"].lastname.value.length===0) {
        alert("姓名不能为空" ); return false;
    }
    if(document.forms["form1"].username.value.length===0) {
        alert("昵称不能为空" ); return false;
    }
    if(!zmnumReg.test(document.forms["form1"].username.value)) {
        alert("昵称必须为数字或字母" ); return false;
    }
    if(document.forms["form1"].password.value.length===0) {
        alert("密码不能为空" ); return false;
    }
//            性别单选判定
    var radio1 = document.getElementsByName("sex");
    var radiocheck = false;
    for(var i=0;i<radio1.length;i++)
    {
        if(radio1[i].checked){
            radiocheck = true;
            break;
        }
    }
    if(!radiocheck){
        alert("请选择性别" ); return false;
    }

    if(document.forms["form1"].address.value.length===0) {
        alert("地址不能为空" ); return false;
    }
    if(document.forms["form1"].zipcode.value.length===0||document.forms["form1"].zipcode.value.length!==6||!reg.test(document.forms["form1"].zipcode.value)){
        alert("请输入正确的邮编" ); return false;
    }
    if(!emailreg.test(document.forms["form1"].email.value))
    {
        alert('请输入有效的邮箱');
        return false;
    }
    if(document.forms["form1"].telephone.value.length===0||document.forms["form1"].telephone.value.length!==11||!reg.test(document.forms["form1"].telephone.value)) {
        alert("请输入正确的手机号" ); return false;
    }
    else return true;
}
function reset1(){
    alert(" 重置表单");
    return true;
}
