![Docker Image Size (latest by date)](https://img.shields.io/docker/image-size/moeinfatehi/file_upload_vulnerabilities)
![Docker Pulls](https://img.shields.io/docker/pulls/moeinfatehi/file_upload_vulnerabilities)
# File Upload Vulnerability Scenarios (Challenges)
This repository is a dockerized PHP application containing some file upload vulnerability challenges (scenarios).</br></br>
**OWASP References:**
* **Classification**: Web Application Security Testing > 10-Business Logic Testing
* **WSTG**: <a href="https://owasp.org/www-project-web-security-testing-guide/v42/4-Web_Application_Security_Testing/10-Business_Logic_Testing/09-Test_Upload_of_Malicious_Files">WSTG-BUSL-09</a></br>

# Bypass Techniques
The ideas behind challenges are:</br>
* Bypassing client-side file extension validations.
* Bypassing client-side file size validations.
* Injecting PHP code into a gif file
* Run any extensions with the PHP engine (using .htaccess file)
* Black-list extension validation bypass
* White-list extension validation bypass
* Double extension bypass
* Server-side file size validation bypass
* Server-side file extension validation bypass
* Content-type validation bypass of file upload
* Finding renamed file names and locations after upload process
* Removing force download (using "Content-Disposition" header) to run the php file by use of htaccess

# Quick Start Using Docker
**Using docker hub (Quickest):**
1. To access the challenges, you need <a href="https://docs.docker.com/install">docker</a> installed.</br>
2. Run this command to pull and run the image from docker hub:</br>`sudo docker run -d -p 9001:80 moeinfatehi/file_upload_vulnerabilities`
3. Access the challenges with this URL: <a href="http://localhost:9001">http://localhost:9001</a>


**Using docker-compose:**  
1. To access the challenges, you need <a href="https://docs.docker.com/install">docker</a> and <a href="https://docs.docker.com/compose/install/">docker-compose</a> installed.</br>
2. Clone the repository</br>`git clone https://github.com/moeinfatehi/file_upload_vulnerability_scenarios.git`
3. Open the main directory of the project (where docker-compose.yml file exists) and run: `docker-compose up`
4. Access the challenges with this URL: <a href="http://localhost:9001">http://localhost:9001</a>

# Attention
* **Do not** host these challenges **without** docker on your main operating system and web server, because any of these challenges are critically dangerous ones, if any hacker can access these challenges on your host webserver, your main OS can be attacked in different ways.</br>
* Using docker-compose which is described above will not have these type of impacts.
# Disclaimer
This project is for educational purposes ONLY. The usual disclaimer applies, especially the fact that I'm not liable for any damages caused by the direct or indirect use of the information or functionality provided by these programs. The author or any Internet provider bears NO responsibility for content or misuse of these programs or any derivatives thereof. By using these projects you accept the fact that any damage (data loss, system crash, system compromise, etc.) caused by the use of this program is not my responsibility.
