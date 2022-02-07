import axios from 'axios';
import {handleServerError, setAuthToken} from '../core/request';

/**
 *
 * @param credential {{ email: string, password: string, remember: boolean|null|undefined }}
 */
export const login = async (credential) => {
  try {
    const response = await axios.post('/auth/login', credential);

    return [response, null];
  } catch (e) {
    return [null, handleServerError(e)];
  }
};

export const getAuthorizationToken = () => document.head.querySelector('meta[name="auth-token"]')?.content;
const hasToken = () => !!getAuthorizationToken();

export const verifyToken = async () => {
  const token = getAuthorizationToken();

  if (!token) {
    throw new Error('User unauthenticated');
  }

  try {
    const response = await axios.get('/api/v1/auth/profile', {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });

    setAuthToken(token);

    return response.data.user;
  } catch (e) {
    throw new Error('User unauthenticated');
  }
}
