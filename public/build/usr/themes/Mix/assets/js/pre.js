
// 初始化评论按钮
(() => {
    window.comment_init = function () {
const commentsReply = document.querySelectorAll('.comment_reply a')
const replyForm = document.querySelector('.reply')
const isComment = document.querySelector('.post-form.is-comment')
for (let el of commentsReply) {
    el.addEventListener('click', e => {
        // 给恢复按钮绑定事件 获取parent-id
        const href = e.target.getAttribute('href')
        window.parentId = href.match(/replyTo=(\d+)/)[1]
        // 弹出回复框
        replyForm.removeAttribute('style')
        if (isComment.classList.contains('active')) isComment.classList.remove('active')
        setTimeout(() => {
            document.getElementById('cancel-comment-reply-link').addEventListener('click', () => {
                replyForm.style.display = 'none'
            })
        })
    })
}
}

window.domParse = new DOMParser()
window.parser = dom => {
return window.domParse.parseFromString(dom, 'text/html')
}
})()
