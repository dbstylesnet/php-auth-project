import React, { useState } from 'react'
import { SignIn } from './components/SignIn'
import { LogIn } from './components/LogIn'
import './App.css'
const App = () => {
  const [tabSwitched, setTabSwitched] = useState(false)

  return (
    <div className="App">
      <header className="App-header">
        <h1>Member Portal</h1>
      </header>
      <div className='switcher'>
        <a className={`signIn ${tabSwitched ? '' : 'active'}`} onClick={()=> setTabSwitched(false)}>Sign Up</a>
        <a className={`logIn ${tabSwitched ? 'active' : ''}`} onClick={()=> setTabSwitched(true)}>Log In</a>
      </div>
      {!tabSwitched 
        ? <SignIn /> 
        : <LogIn />
      }
    </div>
  );
}

export default App;
