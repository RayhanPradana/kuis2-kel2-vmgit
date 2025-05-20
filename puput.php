<?php
// index.php - Main file for Puput Galuh Candra Dewi's CV Website

// Set page title
$pageTitle = "Puput Galuh Candra Dewi - CV";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf8 100%);
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        hr {
            border: none;
            border-top: 2px solid #e0e0ff;
            margin: 20px 0;
        }
        
        /* Header Styles */
        header {
            background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);
            color: white;
            padding: 30px 0;
            text-align: center;
            margin-bottom: 40px;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .profile-img {
            width: 170px;
            height: 170px;
            border-radius: 50%;
            border: 8px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 25px;
            object-fit: cover;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .profile-img:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }
        
        .profile-name {
            font-size: 38px;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: 1px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .profile-title {
            font-size: 20px;
            opacity: 0.9;
            margin-bottom: 25px;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 8px 20px;
            border-radius: 20px;
            letter-spacing: 1px;
        }
        
        .contact-info {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-bottom: 20px;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 8px 15px;
            border-radius: 50px;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        
        .contact-item:hover {
            transform: translateY(-3px);
            background-color: rgba(255, 255, 255, 0.3);
        }
        
        .contact-item i {
            font-size: 18px;
        }
        
        /* Section Styles */
        .section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-top: 5px solid transparent;
        }
        
        .section:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }
        
        #profile {
            border-top-color: #43cea2;
        }
        
        #education {
            border-top-color: #9b59b6;
        }
        
        #expertise {
            border-top-color: #e74c3c;
        }
        
        #work-experience {
            border-top-color: #3498db;
        }
        
        #training {
            border-top-color: #f39c12;
        }
        
        .section-title {
            font-size: 26px;
            margin-bottom: 25px;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 600;
        }
        
        .section-title i {
            background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 28px;
        }
        
        .section-content {
            padding-left: 15px;
        }
        
        /* Profile Section */
        .profile-text {
            text-align: justify;
            line-height: 1.8;
            font-size: 16px;
            color: #555;
        }
        
        /* Two-column layout */
        .columns {
            display: flex;
            gap: 30px;
        }
        
        .column-left {
            flex: 1;
        }
        
        .column-right {
            flex: 2;
        }
        
        /* Education Section */
        .education-item {
            margin-bottom: 25px;
            padding: 15px;
            border-radius: 10px;
            background-color: #f9f9ff;
            border-left: 4px solid #9b59b6;
            transition: transform 0.3s ease;
        }
        
        .education-item:hover {
            transform: translateX(5px);
        }
        
        .education-school {
            font-weight: 600;
            font-size: 18px;
            color: #333;
            margin-bottom: 5px;
        }
        
        .education-degree {
            font-style: italic;
            margin-bottom: 8px;
            color: #666;
        }
        
        .education-date {
            color: #888;
            font-size: 14px;
            background-color: rgba(155, 89, 182, 0.1);
            display: inline-block;
            padding: 3px 10px;
            border-radius: 15px;
        }
        
        /* Expertise Section */
        .expertise-list {
            list-style-type: none;
        }
        
        .expertise-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 10px 15px;
            border-radius: 8px;
            background-color: #f9f9ff;
            transition: transform 0.3s ease, background-color 0.3s ease;
            border-left: 4px solid #e74c3c;
        }
        
        .expertise-list li:hover {
            transform: translateX(5px);
            background-color: #fff0f0;
        }
        
        .expertise-list li:before {
            content: "▹";
            color: #e74c3c;
            font-size: 20px;
        }
        
        /* Work Experience Section */
        .work-item {
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9ff;
            border-left: 4px solid #3498db;
            transition: transform 0.3s ease;
        }
        
        .work-item:hover {
            transform: translateX(5px);
        }
        
        .work-title {
            font-weight: 600;
            font-size: 20px;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        
        .work-company {
            font-style: italic;
            margin-bottom: 8px;
            color: #555;
            font-size: 16px;
        }
        
        .work-date {
            color: #888;
            font-size: 14px;
            background-color: rgba(52, 152, 219, 0.1);
            display: inline-block;
            padding: 3px 10px;
            border-radius: 15px;
            margin-bottom: 15px;
        }
        
        .work-description {
            padding-left: 20px;
            color: #555;
        }
        
        .work-description ol {
            padding-left: 20px;
        }
        
        .work-description li {
            margin-bottom: 12px;
            line-height: 1.7;
        }
        
        /* Training Section */
        .training-item {
            margin-bottom: 25px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9ff;
            border-left: 4px solid #f39c12;
            transition: transform 0.3s ease;
        }
        
        .training-item:hover {
            transform: translateX(5px);
        }
        
        .training-title {
            font-weight: 600;
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        
        .training-description {
            font-style: italic;
            margin-bottom: 10px;
            color: #555;
        }
        
        /* Footer Styles */
        footer {
            text-align: center;
            padding: 25px 0;
            background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);
            color: white;
            margin-top: 40px;
            border-radius: 30px 30px 0 0;
            box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.1);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .columns {
                flex-direction: column;
            }
            
            .contact-info {
                flex-direction: column;
                gap: 15px;
            }
        }
        
        /* Animation */
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
        
        .section {
            animation: fadeIn 0.8s ease forwards;
        }
        
        .section:nth-child(1) { animation-delay: 0.1s; }
        .section:nth-child(2) { animation-delay: 0.3s; }
        .section:nth-child(3) { animation-delay: 0.5s; }
        .section:nth-child(4) { animation-delay: 0.7s; }
        .section:nth-child(5) { animation-delay: 0.9s; }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="profile-container">
                <img src="profile.jpg" alt="Puput Galuh Candra Dewi" class="profile-img">
                <h1 class="profile-name">PUPUT GALUH CANDRA DEWI</h1>
                <h2 class="profile-title">✨ Professional Editor ✨</h2>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>085-785-462-289</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>puputgaluh981@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <section class="section" id="profile">
            <h2 class="section-title"><i class="fas fa-user"></i> PROFILE</h2>
            <div class="section-content">
                <p class="profile-text">
                    With a Bachelor's educational background in Information Management and experience as a technology content editor, I am ready to combine my knowledge and skills to become a valuable contributor in the information technology industry. I believe that the combination of an understanding of IT management and strong editing skills will enable me to convey ideas and information clearly and effectively.
                </p>
            </div>
        </section>

        <div class="columns">
            <div class="column-left">
                <section class="section" id="education">
                    <h2 class="section-title"><i class="fas fa-graduation-cap"></i> EDUCATION</h2>
                    <div class="section-content">
                        <div class="education-item">
                            <p class="education-school">MAN 2 Ponorogo</p>
                            <p class="education-degree">Science</p>
                        </div>
                        
                        <div class="education-item">
                            <p class="education-school">MALANG STATE POLYTECHNIC</p>
                            <p class="education-degree">Diploma of Information and Technology</p>
                            <p class="education-date">2017 - Present</p>
                        </div>
                    </div>
                </section>

                <section class="section" id="expertise">
                    <h2 class="section-title"><i class="fas fa-tools"></i> EXPERTISE</h2>
                    <div class="section-content">
                        <ul class="expertise-list">
                            <li>Management Skills</li>
                            <li>Digital Marketing</li>
                            <li>Critical Thinking</li>
                            <li>Communication Skills</li>
                            <li>Negotiation</li>
                        </ul>
                    </div>
                </section>
            </div>

            <div class="column-right">
                <section class="section" id="work-experience">
                    <h2 class="section-title"><i class="fas fa-briefcase"></i> WORK EXPERIENCE</h2>
                    <div class="section-content">
                        <div class="work-item">
                            <p class="work-title">ATR/BPN KABUPATEN KEDIRI</p>
                            <p class="work-company">Document management</p>
                            <p class="work-date">August 2023</p>
                            <div class="work-description">
                                <ol>
                                    <li>Land and Property Database Management: Building and maintaining a database containing information about land and property.</li>
                                    <li>Creation and Maintenance of Document Archives: Manage document archives relating to land certificates, sale and purchase deeds and other property documents.</li>
                                    <li>Electronic Management System Development: Implement an electronic management system to store, manage and share documents digitally. Migrate data from physical format to digital format by ensuring data integrity and security.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section" id="training">
                    <h2 class="section-title"><i class="fas fa-certificate"></i> TRAINING AND CERTIFICATION</h2>
                    <div class="section-content">
                        <div class="training-item">
                            <p class="training-title">CERTIFICATE OF COMPETENCE</p>
                            <p class="training-description">Computer software programming</p>
                            <p>Topics: training programs or examinations that test knowledge, skills, and abilities in designing, developing, and implementing computer software</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Puput Galuh Candra Dewi | All rights reserved</p>
            <div style="margin-top: 10px;">
                <i class="fab fa-linkedin fa-lg" style="margin: 0 10px; cursor: pointer;"></i>
                <i class="fab fa-github fa-lg" style="margin: 0 10px; cursor: pointer;"></i>
                <i class="fab fa-twitter fa-lg" style="margin: 0 10px; cursor: pointer;"></i>
            </div>
 </div>
    </footer>
</body>
</html>