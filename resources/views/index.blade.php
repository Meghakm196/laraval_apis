<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .profile-card, .post-card, .comment-card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            background: #fff;
            margin-bottom: 15px;
        }
        .profile-name {
            font-weight: bold;
            font-size: 1.2rem;
        }
        .post-title {
            font-weight: bold;
        }
        .comment-text {
            font-style: italic;
        }
        .comment-author {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body onload="fetchData()">

    <div class="container mt-4">
        <h2 class="mb-4">Dashboard</h2>

        <div class="row" id="profiles-list"></div>
        <h3 class="mt-4">Posts</h3>
        <div class="row" id="posts-list"></div>
        <h3 class="mt-4">Comments</h3>
        <div class="row" id="comments-list"></div>
        <h3 class="mt-4">Image Gallery</h3>
        <div class="row" id="image-gallery"></div>
    </div>

    <script>
        function fetchData() {
            // Fetch profiles
            fetch('/api/profiles')
                .then(response => response.json())
                .then(data => {
                    let profilesHTML = data.map(profile => `
                        <div class="col-md-4">
                            <div class="profile-card card">
                                <div class="card-body d-flex align-items-center">
                                    <i class="fas fa-user-circle fa-3x text-primary me-3"></i>
                                    <div>
                                        <p class="profile-name">${profile.name}</p>
                                        <p><i class="fas fa-envelope"></i> ${profile.email}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `).join('');
                    document.getElementById('profiles-list').innerHTML = profilesHTML;
                });

            // Fetch posts
            fetch('/api/posts')
                .then(response => response.json())
                .then(data => {
                    let postsHTML = data.map(post => `
                        <div class="col-md-6">
                            <div class="post-card card">
                                <div class="card-body">
                                    <p class="post-title">${post.title}</p>
                                    <p class="post-body">${post.body}</p>
                                </div>
                            </div>
                        </div>
                    `).join('');
                    document.getElementById('posts-list').innerHTML = postsHTML;
                });

            // Fetch comments
            fetch('/api/comments')
                .then(response => response.json())
                .then(data => {
                    console.log("Fetched comments:", data);
                    let commentsHTML = data.map(comment => {
                        let userName = comment.user ? comment.user.name : "Unknown User";
                        let postId = comment.post ? comment.post.id : "Unknown Post";
                        return `
                            <div class="col-md-4">
                                <div class="comment-card card">
                                    <div class="card-body">
                                        <p class="comment-text">${comment.comment || "No comment text available"}</p>
                                        <p><span class="comment-author">${userName}</span> on Post ${postId}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                    }).join('');
                    document.getElementById('comments-list').innerHTML = commentsHTML;
                })
                .catch(error => console.error("Error fetching comments:", error));

            // Fetch images
            fetch('/api/images')
                .then(response => response.json())
                .then(data => {
                    let imagesHTML = data.map(image => `
                        <div class="col-md-3">
                            <img src="${image}" alt="Image" class="img-fluid">
                        </div>
                    `).join('');
                    document.getElementById('image-gallery').innerHTML = imagesHTML;
                });
        }
    </script>

</body>
</html>
