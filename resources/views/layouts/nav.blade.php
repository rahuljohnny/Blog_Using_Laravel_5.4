<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="http://127.0.0.1:8000">Home</a>
            <a class="nav-link" href="http://127.0.0.1:8000/posts/1">আমাদের উদ্দেশ্য</a>
            <a class="nav-link" href="#">Press</a>
            <a class="nav-link" href="http://127.0.0.1:8000/create">Create new post</a>


    		@if (Auth::check()) <!-- If logged in -->
            	<a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a><!-- Show logged one's name -->
                <a class="nav-link ml-auto" href="http://127.0.0.1:8000/logout">Log Out</a>
            
            @else
                <a class="nav-link ml-auto" href="http://127.0.0.1:8000/login">Log In</a>
                <a class="nav-link" href="http://127.0.0.1:8000/register">Register</a>
            @endif


        </nav>
    </div>
</div>