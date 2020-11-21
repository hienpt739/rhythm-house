# REQUIREMENT SPECIFICATIONS

- A menu that will categorize all the functions of the site

- Display the list of available albums category wise.

- Albums can be of movies or different bands or solo performer’s collections.

- Categories can be CD, DVD, Tape as well as movies, bands, Solo performers. E.g there can be CD of a movie as well as DVD and tape, all should be displayed separately.

- Perform the search based on a particular

  1. movie
  2. band
  3. solo performer
  4. release year

- Display the statistics of albums sold monthly.

- Display the various offers/contests by the shop

- Display the details (performer, time, duration, entry fee etc) of live shows

- Give information about membership.

- Display the available books and magazines.

- Display the price list of the various items available in the shop i.e. (CDs, DVDs, Tapes, Books, Magazines)

- Display the schedule and details of upcoming live shows.

- Site should be able to provide brief introduction/history about the shop under AboutUs page

- The location of the shop under Contact-Us page.

- Besides the above requirements, the site should have look and feel as per the industry standards

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
- firstName
- lastName
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

### OrderDetails

- id_Orders
- id_Albums
- id_Puslish_Type
- price
- num
- total money:
