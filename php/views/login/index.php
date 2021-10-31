<style>
.card {
    margin-bottom: 20px;
    border: none
}
.box {
    width: 500px;
    padding: 40px;
    position: absolute;
    top: 50%;
    left: 50%;
    background: #293a6c;
    text-align: center;
    transition: 0.25s;
    margin-top: 10%;
    border-radius: 0.75rem!important;
}
.box input[type="text"],
.box input[type="password"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 10px 10px;
    width: 250px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s
}

.box h1 {
    color: white;
    text-transform: uppercase;
    font-weight: 500
}

.box input[type="text"]:focus,
.box input[type="password"]:focus {
    width: 300px;
    border-color: #2ecc71
}

.box input[type="submit"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer
}

.box input[type="submit"]:hover {
    background: #2ecc71
}

.forgot {
    text-decoration: underline
}
.color_type{
    color: #ffffff!important;
}
.isa_error {
    color: #D8000C;
    background-color: #FFD2D2;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">

                <form  class="box"  action="<?php echo constant('URL');?>Login/verify" method="POST">
                    <h1>Login</h1>
                    <p class="text-muted color_type"> Please enter your login and password!</p> 
                    <input id="ci" type="text" name="ci" placeholder="Username"> 
                    <input id="password" type="password" name="password" placeholder="Password"> 
                    <div class="isa_error"><?php echo $this->mensaje; ?></div>
                    <input name="submit" type="submit" id="submit" value="Login" >
                </form>
            </div>
        </div>
    </div>
</div>
