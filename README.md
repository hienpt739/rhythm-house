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

# DATABASE: rhythmHouseManagement

## TABLE

### Categories

    - id
    - name (CDs, DVDs, Tapes, Magazines, Books)

### Products

    - id
    - id_category: FK_Categories
    - name
    - number
    - price
    - author
    - performence: (solo, band...)
    - description
    - release_year
    - created
    - updated

### Users

    - id
    - name
    - email
    - phone
    - password
    - address
    - role (0: admin, 1: user)

### Orders

    - id
    - id_Users
    - created_at
    - total money
    - payment: COD, Banking
    - name
    - phone
    - address
    - note

### OrderDetails

    - id_Orders
    - id_Products
    - price
    - number
    - total money

# ADMIN
