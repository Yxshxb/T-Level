const container = document.getElementById('form-container');
    const toggleLink = document.getElementById('toggle-link');

    toggleLink.addEventListener('click', () => {
      if(container.querySelector('h1').textContent === 'Login') {
        container.querySelector('h1').textContent = 'Sign Up';
        container.querySelector('button').textContent = 'Sign Up';
        toggleLink.textContent = 'Log In';
      } else {
        container.querySelector('h1').textContent = 'Login';
        container.querySelector('button').textContent = 'Log In';
        toggleLink.textContent = 'Sign Up';
      }
    });

    container.querySelector('form').addEventListener('submit', e => {
      e.preventDefault();
      alert(`${container.querySelector('h1').textContent} form submitted.`);
    });