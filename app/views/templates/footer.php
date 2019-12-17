
        <!-- footer -->
        <footer class="red darken-1 white-text center light">
          <pclass="flow-text">PT Suryaprabha Jatisatya. Copyright 2019.</p>

        </footer>


      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="<?=BASEURL;?>/js/materialize.min.js"></script>
      <script>
        const sidenav=document.querySelectorAll('.sidenav');
        M.Sidenav.init(sidenav); 

        const slider=document.querySelectorAll('.slider');
        M.Slider.init(slider,{
          indicators:false,
          height:400,
          transition:600,
          interval:3000

        });

        const parallax=document.querySelectorAll('.parallax');
        M.Parallax.init(parallax);

        const materialbox=document.querySelectorAll('.materialboxed');
        M.Materialbox.init(materialbox);

        const scroll=document.querySelectorAll('.scrollspy');
        M.ScrollSpy.init(scroll,{
          scrollOffset:50
        });
      </script>

</body>
  </html>