<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="/ynote">Y-NOTE?</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/ynote/">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ynote/archive.php">Archive</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ynote/tags.php">Tags</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ynote/posting.php">New Post</a>
      </li>
    </ul>
    <form class="form-inline mt-2 mt-md-0" action="search.php" method="get">
      <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>