import React from 'react'
import { Wrapper } from './styles'
import { Form, Field } from 'react-final-form'

const sleep = ms => new Promise(resolve => setTimeout(resolve, ms))

const onSubmit = async values => {
    await sleep(1500)
    window.alert(JSON.stringify(values, 0, 2))
}

const LogIn = () => {
    return (
        <Wrapper>
            <h2>Welcome Back</h2>
            <p className="subtitle">Sign in to your account</p>
            <div className="imgcontainer">
                <img src="/avatar.jpg" alt="Avatar" className="avatar" />
            </div>
            <Form
                onSubmit={onSubmit}
                render={({handleSubmit, form, submitting, pristine, values }) => (
                    <form onSubmit={handleSubmit}>
                        <div className="fieldWrapper">
                            <label>Username</label>
                            <Field
                                name="login"
                                component="input"
                                type="text"
                                placeholder="Enter your username"
                            />
                        </div>
                        <div className="fieldWrapper">
                            <label>Password</label>
                            <Field
                                name="password"
                                component="input"
                                type="password"
                                placeholder="Enter your password"
                            />
                        </div>
                        <div className="buttons">
                            <button type="submit" disabled={submitting || pristine}>
                                {submitting ? 'Signing In...' : 'Sign In'}
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

export { LogIn }
