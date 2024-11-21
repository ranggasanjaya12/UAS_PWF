document.addEventListener("DOMContentLoaded", function () {
    const radioButtons = document.querySelectorAll('input[name="category"]');
    const products = document.querySelectorAll(".product-item");
  
    radioButtons.forEach((radio) => {
      radio.addEventListener("change", function () {
        const selectedCategory = this.value;
  
        products.forEach((product) => {
          const productCategory = product.getAttribute("data-category");
  
          // Tampilkan atau sembunyikan berdasarkan kategori
          if (selectedCategory === "Semua" || selectedCategory === productCategory) {
            product.style.display = "block";
          } else {
            product.style.display = "none";
          }
        });
      });
    });
  });
  
  document.addEventListener('DOMContentLoaded', function () {
    const categoryLinks = document.querySelectorAll('.filter-category');

    categoryLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const categoryId = this.getAttribute('data-category-id');
            const postContainer = document.getElementById('post-container');

            fetch(`/posts/filter?category_id=${categoryId}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Clear the container
                    postContainer.innerHTML = '';

                    // Populate the container with filtered posts
                    data.forEach(post => {
                        postContainer.innerHTML += `
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="/storage/${post.thumbnail}" alt="">
                                </div>
                                <div class="blog_details">
                                    <a class="d-inline-block" href="/blog/${post.title}">
                                        <h2>${post.title}</h2>
                                    </a>
                                    <p>${post.exceprt}</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="ti-user"></i>${post.catblog.name}</a></li>
                                        <li><a><i class="ti-comments"></i> 03 Comments</a></li>
                                    </ul>
                                </div>
                            </article>
                        `;
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
