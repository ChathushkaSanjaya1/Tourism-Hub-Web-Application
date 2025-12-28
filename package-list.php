<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Initialize search variables
$searchName = isset($_GET['search_name']) ? $_GET['search_name'] : '';
$searchType = isset($_GET['search_type']) ? $_GET['search_type'] : '';
$searchLocation = isset($_GET['search_location']) ? $_GET['search_location'] : '';
$searchMinPrice = isset($_GET['min_price']) ? $_GET['min_price'] : '';
$searchMaxPrice = isset($_GET['max_price']) ? $_GET['max_price'] : '';

// Build the SQL query with search filters
$sql = "SELECT * FROM tbltourpackages WHERE 1=1";

// Add search conditions if parameters are provided
if (!empty($searchName)) {
    $sql .= " AND PackageName LIKE :name";
}
if (!empty($searchType)) {
    $sql .= " AND PackageType LIKE :type";
}
if (!empty($searchLocation)) {
    $sql .= " AND PackageLocation LIKE :location";
}
if (!empty($searchMinPrice)) {
    $sql .= " AND PackagePrice >= :min_price";
}
if (!empty($searchMaxPrice)) {
    $sql .= " AND PackagePrice <= :max_price";
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>PEARL HERITAGE TRAVELS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="css/package-list.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<!--//end-animate-->
<style>
:root {
    --primary: #2EC4B6;
    --secondary: #FF9F1C;
    --light: #f6f9fc;
    --dark: #2c3e50;
    --success: #2ecc71;
    --info: #3498db;
    --gradient-primary: linear-gradient(135deg, #2EC4B6 0%, #4FACFE 100%);
    --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.05);
    --shadow-md: 0 5px 15px rgba(0, 0, 0, 0.08);
    --shadow-lg: 0 15px 30px rgba(0, 0, 0, 0.1);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 30px;
    --transition: all 0.3s ease;
}

.hero-section {
    background: var(--gradient-primary);
    background-image: url('https://www.state.gov/wp-content/uploads/2019/04/Sri-Lanka-2132x1406-2.jpg');
    background-size: cover;
    background-position: center;
    padding: 120px 0;
    position: relative;
    overflow: hidden;
    color: white;
    margin-bottom: -60px;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(51, 41, 41, 0.2); /* Dark overlay for readability */
    z-index: 1; /* Ensures the pattern is above the image but below the content */
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    font-family: 'Syne', sans-serif;
    color: #f8fafc; 
}

.hero-subtitle {
    font-size: 1.2rem;
    max-width: 600px;
    margin: 0 auto;
    opacity: 0.9;
    color:rgb(255, 255, 255); 
}

/* Search section styling */
.search-section {
    padding: 30px;
    background: #ffffff;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-lg);
    margin-top: -40px;
    position: relative;
    z-index: 10;
    margin-bottom: 40px;
    width: 130%;
    left: -15%;
    display: flex;
    
}

.search-form {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    align-items: flex-end;
}

.search-group {
    flex: 1 1 200px;
}

.search-label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #1a535c;
    font-size: 0.9rem;
}

.search-input {
    width: 100%;
    padding: 12px 20px;
    border: 1px solid #e2e8f0;
    border-radius: var(--radius-sm);
    font-size: 1rem;
    transition: var(--transition);
}

.price-inputs {
    display: flex;
    gap: 10px;
}

.price-inputs .search-input {
    flex: 1;
}

.search-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(46, 196, 182, 0.2);
}

.search-button {
    display: inline-block;
    padding: 12px 24px;
    background: var(--gradient-primary);
    color: white;
    border: none;
    border-radius: var(--radius-sm);
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    min-height: 46px;
}

.search-button:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
}

.search-reset {
    background: transparent;
    border: 1px solid #e2e8f0;
    color: #64748b;
}

.search-reset:hover {
    background: #f1f5f9;
    color: #334155;
}

.packages-section {
    background: linear-gradient(to bottom, #f6f9fc, #ffffff);
    padding: 60px 0;
}

.section-title {
    text-align: center;
    margin-bottom: 50px;
    position: relative;
}

.section-title h2 {
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    color: var(--dark);
    font-size: 2.5rem;
}

.section-title:after {
    content: '';
    display: block;
    width: 60px;
    height: 3px;
    background: var(--primary);
    margin: 20px auto;
}

.tour-card {
    background: #ffffff;
    border: 1px solid #eaedf2;
    border-radius: var(--radius-lg);
    margin-bottom: 30px;
    position: relative;
    transition: all 0.4s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.tour-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-lg);
}

.tour-thumbnail {
    position: relative;
    border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    overflow: hidden;
}

.tour-thumbnail img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    transition: transform 0.8s ease;
}

.tour-card:hover .tour-thumbnail img {
    transform: scale(1.1);
}

.tour-price {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.95);
    padding: 10px 20px;
    border-radius: var(--radius-xl);
    color: var(--success);
    font-weight: 600;
    font-size: 18px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.tour-content {
    padding: 25px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.tour-title {
    font-size: 22px;
    color: var(--dark);
    margin-bottom: 15px;
    font-weight: 700;
    font-family: 'DM Sans', sans-serif;
}

.tour-meta {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 20px;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #666;
    font-size: 14px;
}

.meta-item i {
    color: var(--info);
}

.tour-features {
    background: #f8fafc;
    padding: 15px;
    border-radius: var(--radius-sm);
    margin-bottom: 20px;
    font-size: 14px;
    line-height: 1.6;
    flex-grow: 1;
}

.tour-features i {
    color: var(--success);
    margin-right: 8px;
}

.tour-action {
    text-align: center;
    margin-top: auto;
}

.view-details-btn {
    display: inline-block;
    padding: 12px 30px;
    background: var(--info);
    color: #fff;
    text-decoration: none;
    border-radius: var(--radius-sm);
    font-weight: 500;
    transition: var(--transition);
    border: 2px solid var(--info);
}

.view-details-btn:hover {
    background: transparent;
    color: var(--info);
    text-decoration: none;
    transform: translateY(-3px);
}

.no-results {
    text-align: center;
    padding: 60px 20px;
    background: #f8fafc;
    border-radius: var(--radius-lg);
    margin: 30px 0;
}

.no-results h3 {
    font-size: 1.5rem;
    color: var(--dark);
    margin-bottom: 15px;
}

.no-results p {
    color: #64748b;
    margin-bottom: 25px;
}

.search-again-btn {
    display: inline-block;
    padding: 12px 30px;
    background: var(--gradient-primary);
    color: white;
    text-decoration: none;
    border-radius: var(--radius-sm);
    font-weight: 500;
    transition: var(--transition);
}

.search-again-btn:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-3px);
    color: white;
    text-decoration: none;
}

/* Animation for search results */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.tour-card {
    animation: fadeIn 0.5s ease-out forwards;
}

.tour-card:nth-child(2) {
    animation-delay: 0.1s;
}

.tour-card:nth-child(3) {
    animation-delay: 0.2s;
}

.search-result-stats {
    background: #f1f5f9;
    padding: 12px 20px;
    border-radius: var(--radius-sm);
    margin-bottom: 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.result-count {
    font-weight: 500;
    color: var(--dark);
}

.filter-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.filter-tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: white;
    padding: 6px 12px;
    border-radius: 30px;
    font-size: 0.85rem;
    color: var(--info);
    border: 1px solid #cbd5e1;
}

.filter-tag i {
    font-size: 0.75rem;
}

@media (max-width: 768px) {
    .hero-section {
        padding: 80px 0;
    }
    
    .hero-title {
        font-size: 2.5rem;
    }
    
    .search-section {
        padding: 20px;
    }
    
    .tour-meta {
        flex-direction: column;
        gap: 10px;
    }
    
    .search-result-stats {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }
    
    .search-form {
        gap: 10px;
    }
    
    .search-group.buttons {
        flex: 1 1 100%;
        display: flex;
        gap: 10px;
    }
    
    .search-button {
        flex: 1;
    }
}
</style>
</head>
<body>
<?php include('includes/header.php');?>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container text-center">
        <h1 class="hero-title wow fadeInUp" data-wow-delay="0.2s">Find Your Perfect Tour</h1>
        <p class="hero-subtitle wow fadeInUp" data-wow-delay="0.4s">Discover breathtaking landscapes, ancient temples, and unforgettable experiences in Sri Lanka</p>
    </div>
</div>

<!-- Search Section -->
<div class="container">
    <div class="search-section wow fadeInUp" data-wow-delay="0.6s">
        <form action="package-list.php" method="GET" class="search-form">
            <div class="search-group">
                <label for="search_name" class="search-label">Package Name</label>
                <input type="text" id="search_name" name="search_name" class="search-input" placeholder="e.g. Beach Tour" value="<?php echo htmlentities($searchName); ?>">
            </div>
            
            <div class="search-group">
                <label for="search_type" class="search-label">Tour Type</label>
                <input type="text" id="search_type" name="search_type" class="search-input" placeholder="e.g. Adventure" value="<?php echo htmlentities($searchType); ?>">
            </div>
            
            <div class="search-group">
                <label for="search_location" class="search-label">Location</label>
                <input type="text" id="search_location" name="search_location" class="search-input" placeholder="e.g. Colombo" value="<?php echo htmlentities($searchLocation); ?>">
            </div>
            
            <div class="search-group">
                <label class="search-label">Price Range (Rs.)</label>
                <div class="price-inputs">
                    <input type="number" name="min_price" class="search-input" placeholder="Min" value="<?php echo htmlentities($searchMinPrice); ?>">
                    <input type="number" name="max_price" class="search-input" placeholder="Max" value="<?php echo htmlentities($searchMaxPrice); ?>">
                </div>
            </div>
            
            <div class="search-group buttons">
                <button type="submit" class="search-button">
                    <i class="fas fa-search"></i> Search
                </button>
                <a href="package-list.php" class="search-button search-reset">
                    <i class="fas fa-redo-alt"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Packages Section -->
<div class="packages-section">
    <div class="container">
        <div class="section-title wow fadeInUp">
            <h2>Explore Our Tour Packages</h2>
        </div>

        <?php
        // Prepare and execute the query with search parameters
        $query = $dbh->prepare($sql);
        
        // Bind search parameters if provided
        if (!empty($searchName)) {
            $searchParam = "%{$searchName}%";
            $query->bindParam(':name', $searchParam, PDO::PARAM_STR);
        }
        if (!empty($searchType)) {
            $searchParam = "%{$searchType}%";
            $query->bindParam(':type', $searchParam, PDO::PARAM_STR);
        }
        if (!empty($searchLocation)) {
            $searchParam = "%{$searchLocation}%";
            $query->bindParam(':location', $searchParam, PDO::PARAM_STR);
        }
        if (!empty($searchMinPrice)) {
            $query->bindParam(':min_price', $searchMinPrice, PDO::PARAM_STR);
        }
        if (!empty($searchMaxPrice)) {
            $query->bindParam(':max_price', $searchMaxPrice, PDO::PARAM_STR);
        }
        
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $count = $query->rowCount();
        
        // Display search result stats if search was performed
        if (!empty($searchName) || !empty($searchType) || !empty($searchLocation) || !empty($searchMinPrice) || !empty($searchMaxPrice)) {
            echo '<div class="search-result-stats">';
            echo '<div class="result-count">' . $count . ' ' . ($count == 1 ? 'package' : 'packages') . ' found</div>';
            echo '<div class="filter-tags">';
            
            if (!empty($searchName)) {
                echo '<div class="filter-tag">Name: ' . htmlentities($searchName) . ' <i class="fas fa-times"></i></div>';
            }
            if (!empty($searchType)) {
                echo '<div class="filter-tag">Type: ' . htmlentities($searchType) . ' <i class="fas fa-times"></i></div>';
            }
            if (!empty($searchLocation)) {
                echo '<div class="filter-tag">Location: ' . htmlentities($searchLocation) . ' <i class="fas fa-times"></i></div>';
            }
            if (!empty($searchMinPrice) || !empty($searchMaxPrice)) {
                $priceRange = '';
                if (!empty($searchMinPrice)) $priceRange .= '$' . htmlentities($searchMinPrice);
                $priceRange .= ' - ';
                if (!empty($searchMaxPrice)) $priceRange .= '$' . htmlentities($searchMaxPrice);
                echo '<div class="filter-tag">Price: ' . $priceRange . ' <i class="fas fa-times"></i></div>';
            }
            
            echo '</div>';
            echo '</div>';
        }
        
        // Display results or no results message
        if ($count > 0) {
            echo '<div class="row">';
            foreach($results as $result) { ?>
                <div class="col-md-4 col-sm-6 wow fadeInUp">
                    <div class="tour-card">
                        <div class="tour-thumbnail">
                            <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" 
                                 alt="<?php echo htmlentities($result->PackageName);?>">
                            <div class="tour-price">
                                Rs. <?php echo htmlentities($result->PackagePrice);?>
                            </div>
                        </div>
                        <div class="tour-content">
                            <h3 class="tour-title"><?php echo htmlentities($result->PackageName);?></h3>
                            <div class="tour-meta">
                                <div class="meta-item">
                                    <i class="fas fa-tag"></i>
                                    <span><?php echo htmlentities($result->PackageType);?></span>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?php echo htmlentities($result->PackageLocation);?></span>
                                </div>
                            </div>
                            <div class="tour-features">
                                <i class="fas fa-check-circle"></i>
                                <?php echo htmlentities($result->PackageFetures);?>
                            </div>
                            <div class="tour-action">
                                <a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" 
                                   class="view-details-btn">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            echo '</div>';
        } else {
            // No results found
            ?>
            <div class="no-results wow fadeIn">
                <i class="fas fa-search" style="font-size: 48px; color: #94a3b8; margin-bottom: 20px;"></i>
                <h3>No Packages Found</h3>
                <p>We couldn't find any tour packages matching your search criteria.</p>
                <p>Try adjusting your search filters or explore all our available tours.</p>
                <a href="package-list.php" class="search-again-btn"><i class="fas fa-redo-alt"></i> View All Packages</a>
            </div>
        <?php } ?>
    </div>
</div>

<?php include('includes/footer.php');?>
<?php include('includes/signup.php');?>
<?php include('includes/signin.php');?>
<?php include('includes/write-us.php');?>

<script>
    // Animate filter tag removal
    document.addEventListener('DOMContentLoaded', function() {
        const filterTags = document.querySelectorAll('.filter-tag');
        
        filterTags.forEach(tag => {
            tag.addEventListener('click', function() {
                // Get the filter type from the tag text
                const tagText = this.innerText.trim();
                const searchParams = new URLSearchParams(window.location.search);
                
                if (tagText.startsWith('Name:')) {
                    searchParams.delete('search_name');
                } else if (tagText.startsWith('Type:')) {
                    searchParams.delete('search_type');
                } else if (tagText.startsWith('Location:')) {
                    searchParams.delete('search_location');
                } else if (tagText.startsWith('Price:')) {
                    searchParams.delete('min_price');
                    searchParams.delete('max_price');
                }
                
                // Redirect to the new URL with updated parameters
                window.location.href = 'package-list.php?' + searchParams.toString();
            });
        });
        
        // Price range validation
        const minPriceInput = document.querySelector('input[name="min_price"]');
        const maxPriceInput = document.querySelector('input[name="max_price"]');
        
        if (minPriceInput && maxPriceInput) {
            minPriceInput.addEventListener('change', function() {
                if (this.value && maxPriceInput.value && Number(this.value) > Number(maxPriceInput.value)) {
                    maxPriceInput.value = this.value;
                }
            });
            
            maxPriceInput.addEventListener('change', function() {
                if (this.value && minPriceInput.value && Number(this.value) < Number(minPriceInput.value)) {
                    minPriceInput.value = this.value;
                }
            });
        }
    });
</script>
</body>
</html>