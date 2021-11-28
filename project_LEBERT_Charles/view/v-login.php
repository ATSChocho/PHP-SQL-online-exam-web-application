<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui image header">
            <div class="content">
                Log-in to your account
            </div>
        </h2>
        <form action="index.php?action=check_logins" method="POST" class="ui large form">
            <div class="ui stacked secondary  segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="email" placeholder="E-mail address">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                </div>
                <button class="ui fluid large teal submit button" type="submit">Login</button>
            </div>

            <div class="ui error message"></div>

        </form>
        <div class="ui message">
            Are you a teacher? <a href="index.php?action=logint">Register</a>
        </div>

    </div>
</div>