# REQUIREMENT SPECIFICATIONS

- A menu that will categorize all the functions of the site. => navbar

- Display the list of available albums category wise. => page: albums

- Albums can be of movies or different bands or solo performer’s collections.

- Categories can be CD, DVD, Tape as well as movies, bands, Solo performers. E.g there can be CD of a movie as well as DVD and tape, all should be displayed separately.

  => albums : filter

- Perform the search based on a particular

  1. movie
  2. band
  3. solo performer
  4. release year

  => albums: searching area

- Display the statistics of albums sold monthly. => page: Home || Albums

- Display the various offers/contests by the shop => page: Home || Special Offers

- Display the details (performer, time, duration, entry fee etc) of live shows. => page: Home || Live Shows

- Give information about membership. => pages: Sign up, Sign in, View + edit info

- Display the available books and magazines. => page: Books & Magazines

- Display the price list of the various items available in the shop i.e. (CDs, DVDs, Tapes, Books, Magazines). => page: Albums -> items -> price

- Display the schedule and details of upcoming live shows. => page: Home || Live Shows

- Site should be able to provide brief introduction/history about the shop under AboutUs page. => page: About Us

- The location of the shop under Contact-Us page. => page: Contact Us

- Besides the above requirements, the site should have look and feel as per the industry standards
<!--

# DATABASE : rhythmHouseManagement

## TABLE

### Categories

- id
- name (R'n Roll, Classic, Jazz, 60's & 70's)

### Albums

- id
- id_category: FK_Categories
- name
- artist
- performence: (solo, band...)
- description
- releaseYear
- price
- created
- updated

### Puslish_Type

- id
- name (CD, DVD, Tape, Magazine...)

### Albums_Available

- id_Albums: FK_Albums
- id_Puslish_Type: FK_Puslish_Type
- num (available)

### Customers

- id
- name
- email
- phone
- address

### Users

- id
- id_Customers
- name
- email
- phone
- password

### Orders

- id
- id_Customers
- created_at
- total money
- status: 0, 1, -1
- expected_time:
- delivered_time:
- note

### OrderDetails

- id_Orders
- id_Albums
- id_Puslish_Type
- price
- num
- total money:

# DATABASE 2

### Categories:

    - id
    - name (album, book, magazine, movie...)

### Prouducts:

    - id
    - id_Categories
    - name
    - price
    - thumnail_link
    - description
    - created_at
    - updated_at
    - artist
    - performance
    - release_year

### Albums_Puslish_Type:

    - id
    - name (CD, DVD, Tape...)

### Albums_Available:

    - id_Products
    - id_Albums_Puslish_Type
    - number

### Customers:

    - id
    - name
    - phone
    - address

### Users:

    - id
    - id_Customers
    - name
    - email
    - password

### Orders:

    - id
    - id_Customers
    - created_at
    - total money ?
    - status: 0, 1, -1
    - note

### OrderDetails:

    - id_Orders
    - id_Albums
    - id_Puslish_Type
    - price
    - num
    - total money ?

-->

# DATABASE: rhythmHouseManagement

### Categories:

    - id
    - name (CDs, DVDs, Tapes, Books, Magazines...)

### Prouducts:

    - id
    - name
    - thumnail_link
    - artist
    - performance
    - music_type
    - release_year
    - created_at
    - updated_at

### Products_Detail

    - id_Prouducts
    - id_Categories
    - number
    - price
    - description
    - created_at
    - updated_at

### Customers:

    - id
    - name
    - phone
    - address
    - created_at
    - updated_at

### Users:

    - id
    - id_Customers
    - name
    - email
    - password
    - created_at
    - updated_at

=> xem xét gộp Users và0 Customers : thêm trường is_Member

### Orders:

    - id
    - id_Customers
    - total money ?
    - status: 0, 1, -1
    - created_at
    - updated_at
    - note

### Order_Details:

    - id_Orders
    - id_Products
    - price
    - nummber
    - total money ?

# ADMIN

## Requirements

- sign-in
- add / edit / delete categories
- add / edit / delete products
