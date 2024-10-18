import './bootstrap';
import  '../sass/app.scss'

let select = document.querySelector(".select")
let select1 = document.querySelector(".select1")
let a = document.querySelector(".a")
select.addEventListener("change",()=>{
    a.click()
})
select1.addEventListener("change",()=>{
    a.click()
})


