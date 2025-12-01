import React from 'react'
import { Wrapper } from './styles'
import { Form, Field } from 'react-final-form'

const sleep = ms => new Promise(resolve => setTimeout(resolve, ms))

const onSubmit = async values => {
  await sleep(1500)
  window.alert(JSON.stringify(values, 0, 2))
}

const SignIn = () => {
    return(
        <Wrapper>
            <h2>Create Account</h2>
            <p className="subtitle">Sign up to get started</p>
            <div className="imgcontainer">
                <img src="/avatar.jpg" alt="Avatar" className="avatar" />
            </div>
            <Form
                onSubmit={onSubmit}
                render={({ handleSubmit, form, submitting, pristine, values }) => (
                    <form onSubmit={handleSubmit}>
                        <div className="fieldWrapper">
                            <label>Username</label>
                            <Field
                                name="SignIn"
                                component="input"
                                type="text"
                                placeholder="Choose a username"
                            />
                        </div>
                        <div className="fieldWrapper">
                            <label>Password</label>
                            <Field
                                name="SignInPassword"
                                component="input"
                                type="password"
                                placeholder="Create a password"
                            />
                        </div>            
                        <div className="fieldWrapper">
                            <label>Confirm Password</label>
                            <Field
                                name="ConfirmPassword"
                                component="input"
                                type="password"
                                placeholder="Confirm your password"
                            />
                        </div>       
                        <div className="buttons">
                            <button type="submit" disabled={submitting || pristine}>
                                {submitting ? 'Creating...' : 'Create Account'}
                            </button>
                            <button
                                type="button"
                                onClick={form.reset}
                                disabled={submitting || pristine}
                            >
                                Clear
                            </button>
                        </div>
                    </form>
                )}
            />
        </Wrapper>
    )
}

export { SignIn } 
