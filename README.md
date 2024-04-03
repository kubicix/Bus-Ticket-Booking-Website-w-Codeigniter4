# 🎟️ Bus Ticket Booking Website 

The Ticket Booking Website is a web application developed using CodeIgniter 4 (CI4) framework. It allows users to select seats on a bus seat map picker, make secure payments via Stripe payment system, manage their account, and reserve tickets.

## 🛠️ Technologies Used

- **Frontend:**
    - HTML
    - CSS
    - JavaScript
    - Bootstrap
    - Fontawesome

- **Backend:**
    - PHP (CodeIgniter 4)
    - MySQL (Database)

## 🚌 Features

###  Bus Seat Map Picker 💺
- Users can select seats on the bus seat map picker.
- Occupied seats are disabled.
- The gender of seated passengers can be observed.

###  Stripe Payment Integration 💳
- Secure payment processing through Stripe payment system.

###  User Authentication and Account Management 🙍‍♀️🙍‍♂️
- User authentication and registration system.
- Users can view and update their account information.
- Users can purchase tickets or reserve them for later.

###  Ticket Reservation 🎫
- Users can reserve tickets for future purchase.
- Reserved tickets are automatically deleted if not purchased within 2 days, triggered by a database trigger.

###  Admin Panel 🧑‍💼
- The application also includes an admin panel for managing users, bookings, and other administrative tasks.

###  QR Code Ticket Verification 📱
- Customers can view QR codes for their purchased tickets.
- QR codes facilitate ticket validation by allowing passengers to display them when boarding the bus.
- Bus staff can easily match the QR codes with the PNR codes to validate tickets.
 
### Google Maps Integration for Route Visualization 🗺️
- Users can view the departure and arrival points on Google Maps during the ticket purchasing process.
- The selected departure and arrival points are dynamically plotted on the map using JavaScript.
- This feature provides users with a visual representation of their journey route, enhancing their understanding of the trip's itinerary.
  
### Password Reset via Email 🔑📧
- A "Forgot Password?" feature allows users to initiate the password reset process.
- Users can reset their passwords through a password reset link sent to their email.
- Upon request, an email containing a unique password reset link is sent to the user's registered email address.

## 📷 Screenshots 

![routeshow](https://github.com/kubicix/Bus-Ticket-Booking-Website-w-Codeigniter4/assets/96316375/abe15a8c-ac95-4012-b5c7-72a14a541ab5)
![seatmap](https://github.com/kubicix/Bus-Ticket-Booking-Website-w-Codeigniter4/assets/96316375/f4eb8d5a-e313-4d78-9f55-8faf510d0394)
![stripepayment](https://github.com/kubicix/Bus-Ticket-Booking-Website-w-Codeigniter4/assets/96316375/69f8c13d-afc0-42d5-b138-09c66d38ecd5)
![ticketdetail](https://github.com/kubicix/Bus-Ticket-Booking-Website-w-Codeigniter4/assets/96316375/d2ccc85c-3b47-45f5-a9d1-d1699d6208db)
![ticketwithqrcode](https://github.com/kubicix/Bus-Ticket-Booking-Website-w-Codeigniter4/assets/96316375/2091025b-96d2-4365-af63-2c62f94f3f70)
![userdetail](https://github.com/kubicix/Bus-Ticket-Booking-Website-w-Codeigniter4/assets/96316375/86691517-4769-4b8f-babc-ffd059d2f1d5)
![adminpanel](https://github.com/kubicix/Bus-Ticket-Booking-Website-w-Codeigniter4/assets/96316375/651e566a-e7de-4c1a-891e-8096a9f703bd)

## 🚀 Getting Started

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/ticket-booking-website.git
    ```

2. Navigate to the project directory:

    ```bash
    cd ticket-booking-website
    ```

3. Install dependencies:

    ```bash
    composer install
    ```

4. Set up the database:
    - Import the SQL dump file provided in the `database` directory.

5. Configure environment variables:
    - Set up Stripe API keys and other configuration details in the `.env` file.

6. Start the development server:

    ```bash
    php spark serve
    ```

7. Access the application in your web browser:

    ```
    http://localhost:8080
    ```



## 📝 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
