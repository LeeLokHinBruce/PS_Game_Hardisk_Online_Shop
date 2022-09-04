<?php include('header.php') ?>
    <i class="fa fa-user-circle-o" style="font-size: 120px; margin-bottom: 30px;"></i><br>
    <form action="./functions.php?op=checkLogin" method="post">            
        <!-- Staff Email -->
        <div class="form-row">
            <label for="email">Staff Email:</label>
            <input type="email" id="email" name="email" required />
        </div>
        
        <!-- Staff Password -->
        <div class="form-row">
            <label for="password">Staff Password:</label>
            <input type="password" id="password" name="password" min="8" max="16" pattern="{8,16}" required/>
        </div>

        <!-- Login -->
        <input type="submit" value="Login" />
    </form>

<?php include('footer.php') ?>