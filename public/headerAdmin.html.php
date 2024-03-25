

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <base href="<?= ROOT ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../public/assets/css/styles.css">
    <title>Document</title>
</head>
<style>
    /*========= GOOGLE FONTS =========*/
@import url('https://fonts.googleapis..com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

:root{
    --header-height: 3.5rem;
 /*========== Colors ==========*/
 /*Color mode HSL(hue, saturation, lightness)*/
 --first-color: hsl(230, 75%, 56%);
 --title-color: hsl(230, 75%, 15%);
 --text-color: hsl(230, 12%, 40%);
 --body-color: hsl(230, 100%, 98%);
 --container-color: hsl(230, 100%, 97%);
 --border-color: hsl(230, 25%, 80%);
 /*========== Font and typography ==========*/
 /*.5rem = 8px | 1rem = 16px ...*/
 --body-font: "Syne", sans-serif;
 --h2-font-size: 1.25rem;
 --normal-font-size: .938rem;
 /*========== Font weight ==========*/
 --font-regular: 400;
 --font-medium: 500;
 --font-semi-bold: 600;
 /*========== z index ==========*/
 --z-fixed: 100;
 --z-modal: 1000;
}

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    width: 100%;
    background: var(--body-color);
    /* color: var(--text-color); */
    position: relative;
    /* display: flex; */

}
#menu{
    background: #111827;
    width: 300px;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
}
#menu .logo{
    display: flex;
    align-items: center;
    color: #fff;
    padding: 30px 0 0 30px;
}
#menu .logo img{
    width: 40px;
    margin-right: 15px;
}
#menu .items{
    margin-top: 40px;
}
#menu .items li{
    list-style: none;
    padding: 15px 0;
    transition: 0.3s ease;
}
#menu .items li:hover{
    background: #253047;
    cursor: pointer;
}
#menu .items li:nth-child(1){
    border-left: 4px solid #fff;
}
#menu .items li i{
    color: rgb(134, 141, 151);
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    font-size: 14px;
    margin: 0 10px 0 25px;
}
#menu .items li:hover i,
#menu .items li:hover a{
    color: #F3F4F6;
}
#menu .items li a{
    text-decoration: none;
    color: rgb(134, 141, 151);
    font-weight: 300px;
    transition: 0.3s ease;
    padding: 16px 16px;
}
.interface{
    width: calc(100% - 300px);
    margin-left: 300px;
    position: relative;

}
.interface .navigation{
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
    padding: 15px 30px;
    border-bottom: 3px solid hsl(230, 75%, 56%);
    position: fixed;
    width: calc(100% - 300px);
}
.interface .navigation .search{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 10px 14px;
    border: 1px solid #d7dbe6;
    border-radius: 4px;
}
.interface .navigation .search i{
    margin-right: 14px;
}
.interface .navigation .search input{
    border: none;
    outline: none;
    font-size: 14px;
}
.interface .navigation .profile{
    display: flex;
    justify-content: flex-start;
    align-items: center;
}
.interface .navigation .profile i{
    margin-right: 20px;
    font-size: 19px;
    font-weight: 400;
}
.interface .navigation .profile img{
    width: 30px;
    height: 30px;
    object-fit: cover;
    border-radius: 50%;
}
.i-name{
    color: #444a53;
    padding: 30px 30px 0 30px;
    font-size: 24px;
    font-weight: 700;
    margin-top: 70px;
}
.values{
    padding: 30px 30px 0 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}
.values .val-box{
    background: #fff;
    width: 235px;
    padding: 16px 20px;
    border-radius: 5px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}
.values .val-box i{
    font-size: 25px;
    width: 60px;
    height: 60px;
    line-height: 60px;
    border-radius: 50%;
    text-align: center;
    color: #fff;
    margin-right: 15px;
}
.values .val-box:nth-child(1) i{
    background: var(--text-color);
}
.values .val-box:nth-child(2) i{
    background: var(--text-color);
}
.values .val-box:nth-child(3) i{
    background: var(--text-color);
}
.values .val-box:nth-child(4) i{
    background: var(--text-color);
}
.values  .val-box h3{
    font-size: 18px;
    font-weight: 600;
}
.values .val-box span{
    font-size: 15px;
    color: var(--text-color);
}
.board{
    width:94%;
    margin: 30px 0 30px 30px;
    overflow: auto;
    background: #fff;
    border-radius: 8px;
}
.board img{
    width: 45px;
    height: 45px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 15px;
}
.board h5{
    font-weight: 600;
    font-size: 14px;
}
.board p{
    font-weight: 400;
    font-size: 13px;
    color: var(--text-color);
}
.board .people{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    text-align: start;
}
table{
    border-collapse: collapse;
}
tr{
    border-bottom: 1px solid #eef0f3;
}
thead td{
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 400;
    background: var(--body-color);
    text-align: start;
    padding: 15px;
}
tbody tr td{
    padding: 10px 15px;
}

.active p{
    background: #d7fada; /* user connected */
    padding: 2px 10px;
    display: inline-block;
    border-radius: 40px;
    color: #2b2b2b;
}
.edit a{
    text-decoration: none;
    font-size: 14px;
    color: #554cd1;
    font-weight: 600;
}
</style>
<body>
    <section class="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="far fa-bars"></i>
                </div>
                <div class="search">
                    <i class="far fa-search"></i>
                    <input type="text" placeholder="Search...">
                </div>
            </div>
                <div class="profile">
                    <i class="far fa-bell"></i>
                    <img src="../public/assets/img/pexels-cz-jen-15613792.jpg" alt="">
                </div>
            </div>
    </section>
           
        <?php include __DIR__ . "/navAdmin.html.php"; ?>
        <?php include __DIR__ . "/../views/message.html.php";?>