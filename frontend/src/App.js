import React, { useState } from 'react';
import logo from './logo.svg';
import { SignIn } from './components/SignIn'
import './App.css'
const App = () => {
  const [tabSwitched, setTabSwitched] = useState(false)

  return (
    <div className="App">
      <header className="App-header">
        We log in and sign in here
      </header>
      <div className='switcher'>
        <a className='signIn'>Sign In</a>
        <a className='logIn'>Log In</a>
      </div>
      {!tabSwitched 
        ? <SignIn /> 
        : ''}
    </div>
  );
}

export default App;
