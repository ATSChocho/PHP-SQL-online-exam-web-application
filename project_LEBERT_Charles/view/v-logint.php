<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui image header">
            <div class="content">
                Hello teacher, log in to your account
            </div>
        </h2>
        <form action="index.php?action=check_logint" method="POST" class="ui large form">
            <div class="ui stacked secondary  segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="emailt" placeholder="E-mail address">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="passwordt" placeholder="Password">
                    </div>
                </div>
                <button class="ui fluid large teal submit button" type="submit">Login</button>
            </div>

            <div class="ui error message"></div>

        </form>
        <div class="ui message">
            Are you a student? <a href="index.php?action=login">Register</a>
        </div>
        <div class="ui message">
            New to us? <a href="index.php?action=registert">Register</a>
        </div>

    </div>
</div>