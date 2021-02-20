/**
 * FontZoom 函数
 * 函数变量：size
 * 调用方法：FontZoom(size)
 * 函数用途：用于调整文章文字大小
 */
function FontZoom(size){
    var text=document.getElementById("write");
    text.style.fontSize=size +"px";
}

/**
 * 用于激活menu菜单栏
 * btn_active 为按钮，双向激活
 * Header_head-menu__ofiV5 为 菜单 单
 */

// 原生js编写技术
document.getElementById("btn_active").onclick = function(){
    name1 = document.getElementById("header").className;
    if(name1 == 'assets'){
        document.getElementById('header').className = 'assets active';
    }else{
        document.getElementById('header').className = 'assets';
    }
}
document.getElementById("Header_head-menu__ofiV5").onclick = function(){
    name1 = document.getElementById("header").className;
    if(name1 != 'assets'){
        document.getElementById('header').className = 'assets';
    }
}

/**
 * 用于绑定与解除loading
 * 
 */
document.addEventListener('pjax:send', function () {
    document.body.classList.add("loading")
})
document.addEventListener('pjax:complete', function () {
    document.body.classList.remove("loading")

})

/*
 * Only jQuery版本

 $("#btn_active").click(function(){
    name1 = document.getElementById("header").className;
       if(name1 == 'assets'){
        $('#header').addClass('active');    
    }else{
        $('#header').removeClass('active');        
    }
});
$("#Header_head-menu__ofiV5").click(function(){
    name1 = document.getElementById("header").className;
       if(name1 != 'assets'){
        $('#header').remoteClass('active');    
    }
});
*/
