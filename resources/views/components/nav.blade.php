<nav class="navbar navbar-light bg-light px-2">
    <div class="flex-start">
        <a class="navbar-brand" href="/">DailyJournal</a>
    </div>
    <div class="flex-end">
        @auth
            <button type="button" id="uploadbtn" class="btn btn-primary">Upload</button>
            <a href="/logout"><button id="redbtn">Logout</button></a>
        @endauth
        @guest
            <a href="login"><button type="button" class="btn btn-primary">Login</button></a>
        @endguest
    </div>
</nav>

