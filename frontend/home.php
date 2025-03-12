<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoCleckOut - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/home.css">
    <style>
        .container-main {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .categories {
            width: 220px;
            padding: 15px;
            background-color: #f9f9f9;
            border-right: 1px solid #ddd;
            height: auto;
        }
        .categories ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .categories li {
            padding: 12px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.2s ease-in-out;
        }
        .categories li:hover, .categories li.active {
            background-color: #3B82F6;
            color: white;
        }
        .products {
            flex: 1;
            padding: 20px;
            width: 100%;
            overflow: hidden;
        }
        .product-grid, .top-selling {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .product-card {
            width: 100%;
            max-width: 200px;
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
        .cart-btn {
    display: inline-block;
    margin-top: 5px;
    padding: 3px 8px;  /* Smaller size */
    background-color: transparent;  /* No fill */
    color: #3B82F6;
    border: 1px solid #3B82F6;  /* Thinner border */
    border-radius: 12px;  /* More rounded corners */
    cursor: pointer;
    font-size: 12px;  /* Smaller text */
    transition: 0.3s;
    font-weight: bold;
}

.cart-btn:hover {
    border-color: #2563EB;
    color: #2563EB;
}


        .top-selling {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            overflow: hidden;
            white-space: nowrap;
            animation: slide 15s linear infinite;
        }
        @keyframes slide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }
        @media (max-width: 768px) {
            .container-main {
                flex-direction: column;
            }
            .categories {
                width: 100%;
                text-align: center;
                border-right: none;
                border-bottom: 1px solid #ddd;
            }
            .categories ul {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 10px;
            }
            .categories li {
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body class="home-body">
    <div class="container-main">
        <div class="categories">
            <h4>Categories</h4>
            <ul>
                <li class="category-item" data-category="all">All</li>
                <li class="category-item" data-category="butchers">Butchers</li>
                <li class="category-item" data-category="fishmongers">Fishmongers</li>
                <li class="category-item" data-category="delicatessen">Delicatessen</li>
                <li class="category-item" data-category="groceries">Groceries</li>
                <li class="category-item" data-category="bakeries">Bakeries</li>
            </ul>
        </div>

        <div class="products">
            <h2>Top Selling Items</h2>
            <div class="top-selling"></div>
            <h2>All Products</h2>
            <div class="product-grid"></div>
        </div>
    </div>

    <script>
        const productsData = {
            butchers: [
                { name: "Steak", image: "assets/steak.jpg", price: "$12.99" },
                { name: "Ground Beef", image: "assets/beef.jpg", price: "$8.99" },
                { name: "Lamb Chops", image: "assets/lamb.jpg", price: "$14.99" },
                { name: "Chicken Breast", image: "assets/chicken.jpg", price: "$6.99" },
                { name: "Pork Ribs", image: "assets/ribs.jpg", price: "$11.99" },
                { name: "Turkey", image: "assets/turkey.jpg", price: "$19.99" }
            ],
            fishmongers: [
                { name: "Salmon", image: "assets/salmon.jpg", price: "$10.99" },
                { name: "Tuna", image: "assets/tuna.jpg", price: "$9.99" },
                { name: "Shrimp", image: "assets/shrimp.jpg", price: "$15.99" },
                { name: "Lobster", image: "assets/lobster.jpg", price: "$22.99" },
                { name: "Crab Legs", image: "assets/crab.jpg", price: "$18.99" },
                { name: "Cod Fillet", image: "assets/cod.jpg", price: "$8.99" }
            ],
            delicatessen: [
                { name: "Salami", image: "assets/salami.jpg", price: "$7.99" },
                { name: "Prosciutto", image: "assets/prosciutto.jpg", price: "$9.99" },
                { name: "Roast Beef", image: "assets/roastbeef.jpg", price: "$8.99" },
                { name: "Smoked Turkey", image: "assets/smokedturkey.jpg", price: "$10.99" },
                { name: "Pastrami", image: "assets/pastrami.jpg", price: "$7.49" },
                { name: "Mortadella", image: "assets/mortadella.jpg", price: "$6.99" }
            ]
        };

        function renderProducts(category) {
            const topSellingContainer = document.querySelector(".top-selling");
            const productGrid = document.querySelector(".product-grid");

            let selectedProducts = category === "all"
                ? Object.values(productsData).flat()
                : productsData[category];

            topSellingContainer.innerHTML = selectedProducts.slice(0, 3).map(item => `
                <div class="product-card">
                    <img src="${item.image}" alt="${item.name}">
                    <p>${item.name}</p>
                    <p class="price">${item.price}</p>
                    <button class="cart-btn">🛒 Add to Cart</button>
                </div>
            `).join('');

            productGrid.innerHTML = selectedProducts.map(item => `
                <div class="product-card">
                    <img src="${item.image}" alt="${item.name}">
                    <p>${item.name}</p>
                    <p class="price">${item.price}</p>
                    <button class="cart-btn">🛒 Add to Cart</button>
                </div>
            `).join('');
        }

        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".category-item").forEach(category => {
                category.addEventListener("click", function () {
                    document.querySelectorAll(".category-item").forEach(cat => cat.classList.remove("active"));
                    this.classList.add("active");
                    renderProducts(this.getAttribute("data-category"));
                });
            });

            renderProducts("all"); // Show all products initially
        });
    </script>
</body>
</html>
