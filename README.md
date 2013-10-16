# Apache Status Monitor

See http://uptimesoftware.github.io for more information.

### Tags 
 plugin   aix   lpar  

### Category

{ page.category }}

### Version Compatibility


  
    * Apache Status Monitor 3.1 - 7.1, 7.0
  

  
    * Apache Status Monitor 3.0 - 6.0, 5.5, 5.4, 5.3, 5.2
  


### Description
Retrieves the "MOD-STATUS" from Apache into monitored metrics. See here for more details: [http://httpd.apache.org/docs/2.0/mod/mod_status.html](http://httpd.apache.org/docs/2.0/mod/mod_status.html)


### Supported Monitoring Stations

7.1, 7.0

### Supported Agents
None; no agent required

### Installation Notes
<p><a href="https://github.com/uptimesoftware/uptime-plugin-manager">Install using the up.time Plugin Manager</a></p>


### Dependencies
<ul>
<li>Apache 2.x
-- mod_status loaded
-- Extended Status option enabled</li>
</ul>


<p>Example:</p>

<p>SetHandler server-status
Order Deny,Allow
Deny from all
Allow from 66.241.134.174</p>

<p>ExtendedStatus On</p>


### Input Variables
* Apache Port* URL (/server-status)

### Output Variables

* Total Accesses Since Daemon Restart* Total kBytes Since Daemon Restart* Uptime for the HTTP Daemon* Requests Per Second* Bytes Served Per Second* Bytes Served Per Request* Busy Worker Processes* Idle Worker Processes

### Languages Used
* Shell/Batch* PHP

