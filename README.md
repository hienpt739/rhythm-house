# DATABASE : rhythmMusicManagement

## TABLE

### Categories

- R'n Roll
- Classic
- Jazz..
- 60's & 70's

### albums

- id
- name
- type: FK_Categories
- artist
- performence: (solo, band...)
- release year
- price
- total
- created
- updated

### Puslish_Type

- id
- name
  1 - CD
  2 - DVD
  3 - Tape
  4 - Magazine

### Albums_Available

- id_albums
- id_Puslish_Type
- num
  1 - CD - 3
  1 - DVD - 2
  1 - Tape - 2

