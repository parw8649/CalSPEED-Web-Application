# Calspeed

Pre-requisites: Amazon Linux 2 EC2 instance.
 
Procedures: Then We need to install an Apache web server, PHP programming language and an sql database such as MariaDB. There is also a package called LAMP stack which includes Apache, PHP, and MariaDB. Then after that we will install Librespeed on our EC2 instance. 

Step 1: Before we do anything, we need to gain access to our EC2 instance via command line/terminal using SSH or using a program like Putty. When you have an EC2 instance you can create a key value pair that acts as an authenticator so that you can connect to your EC2 instance from different devices via SSH. The key value pair can be created in .PPK for Putty or .PEM for SSH. 

Once you have Putty, you would need to input the hostname, usually ec2-user@ip_address of the server. Port would be 22, and select SSH from connection type. Then you would need the ppk file that you generated and downloaded from the EC2 instance. In Putty, on the left side navigation, navigate to SSH/authentication. On this window you will select the path to the PPK file, under Authentication parameters->private key file. 

Once you have all of that information on Putty then you are ready to log into your EC2 instance. Simply go back to the initial window or session window and click on open. Then you would see something like this below, click yes.
Then you would be brought to this screen. Congratulations you have now access the EC2 instance successfully!

If you have a Mac you can connect to the EC2 instance using your command line/terminal, the steps are similar as putty, you still need the key pair but this time, we would use the .PEM keys. Once you access your commandline you would type the following: SSH -i keypairfile hostname@ip_address. Notice how in this example the key is placed under the capsp22 folder and since we are in this folder we can just add the keypair file name otherwise we would add the path where the key pair is located. Its recommended that you also update your Ec2 instance as mentioned below. 

Step 2: We need to install an Apache web server, PHP programming language and an sql database such as MariaDB. There is also a package called LAMP stack which includes Apache, PHP, and MariaDB. Then after that we will install Librespeed on our EC2 instance.

Step 3: PHPmyadmin, connecting database to EC2 instance.
https://csumb.hosted.panopto.com/Panopto/Pages/Viewer.aspx?id=d82e49a5-e8d6-45b4-851b-ae55017672f1
I think this video has information about how we installed phpmyadmin

Step 4: Database setup/configuration

Step 5: virtualization

Extras: using Winscp to transfer files from EC2 instances into local storage. 

The next steps are how the database became functional or active. PHPmyadmin

Virtualization
You would need virtualbox, a Linux OS, most version of ubuntu work, https://fdossena.com/?p=speedtest/quickstart_v5_ubuntu.frag

How to use winsp to transfer files from ec2 instance to personal computer, https://winscp.net/eng/docs/guide_amazon_ec2
