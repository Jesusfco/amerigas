<div class="footer">
    <div class="text">@Copyright {{ date("Y")}} | All Rights Reserved | Powered by <span> Laravel</span></div>
    <div class="img"><a href="http://rodriguez.amerigas.mx/"><img src="{{ url('images/Rodriguez.png') }} "></a>
    </div>
</div>    


<style>
.footer {
    padding: 20px 35px;
    display: flex;
    background: white;
    justify-content: space-between;
    border-top: 1px solid #d0d0d0;
    margin-top: 70px;
}

.footer div {
    display:flex;
    align-items:center;
}

.footer .text span {
    font-weight: 800;
}

.footer img {
    height: 50px;
}

@media screen and (max-width: 800px){

    .footer .text{
    display:block;
    text-align:center;
}



    .footer{
        display: block;
    }
    .footer img {
    
        display:block;
        margin: 20px auto;
    }
}
</style>