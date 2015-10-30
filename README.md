a BIN/IIN fetcher from binlist.net

if ($_bin = Binlist::get('458011')->getData()) {
            dd($_bin);
        } else {
            dd("no");
        }

# 
Binlist
======
**Binlist** is a an integration package with Binlist.net for Laravel.

To install Binlist, use composer:
```
$ composer install ikanc/binlist 
```
or add `"ikanc/binlist": "1.*"` under require in `app.php` 


To get a specific BIN/IIN, use the following example (458011):
```
$_bin = Binlist::get('458011')->getData();
if ($_bin) {
 // Do something with the returned object
}
```
## Version 
* Version 1.0.1

## Contact
#### Developer/Company
* Homepage: http://www.net-comet.com
* e-mail: ika@net-comet.com